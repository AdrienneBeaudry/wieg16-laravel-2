<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ch = curl_init();
        $url = "https://www.milletech.se/invoicing/export/";
        $this->info("Importing data from: ".$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $this->info("Sending request...");
        $result = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $this->info("Looping through orders...");
       // $companies = [];
        foreach ($result as $order) {
            $this->info("Inserting/updating customer with id: ".$order['id']);
            $dbOrder = Order::findOrNew($order['id']);
            $dbOrder->fill($order)->save();


            // Importing addresses in separate table
            if ($customer['address']==!null) {
                $this->info("Inserting/updating address with id: ".$customer['address']['id']);
                $dbCustomerAddress = CustomerAddress::findOrNew($customer['address']['id']);
                $dbCustomerAddress->fill($customer['address'])->save();
            }

            // Importing companies in separate table
            $this->info("Inserting/updating customer with id: ".$customer['id']);
            $companies[] = $customer['customer_company'];
        }

        $companies = array_unique($companies);

        foreach ($companies as $company) {
            $this->info("Inserting/updating company table for ".$company);
            /* @var Company $dbCompany */
            $dbCompany = Company::findOrNew($company);
            $dbCompany->company_name = $company;
            // Another way to do it below, using fill...
            //$dbCompany->fill(['company_name' => $company]);
            $dbCompany->save();

            /*
             * ANOTHER WAY TO DO IT...
             $customers = Customer::where('customer_company', '=', $dbCompany->company_name)->get();
             foreach ($customers as $customer) {
                 $customer->company_id = $dbCompany->id;
                 $customer->save();
             }
 */
            //Update statement
            DB::table('customers')
                ->where('customer_company', '=', $dbCompany->company_name)
                ->update(['company_id' => $dbCompany->id]);
        }

    }
}
