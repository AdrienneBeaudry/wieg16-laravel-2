<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products';

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
        $file = "storage/app/products.json";
        $this->info("Importing data from: ".$file);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $this->info("Sending request...");
        $result = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $this->info("Looping through products...");
        foreach ($result as $product) {
            $this->info("Inserting/updating product with sku: ".$product[0]['sku']);
            $dbProduct = Product::findOrNew($product[0]['sku']);
            $dbProduct->fill($product)->save();

            $this->info("Inserting/updating group prices...");
            if ($product['group_prices']==!null) {
                $this->info("Inserting/updating billing address with id: ".$order['billing_address']['id']);
                $dbItems = CustomerAddress::findOrNew($order['billing_address']['id']);
                $dbItems->fill($order['billing_address'])->save();
            }

            // Importing shipping address
            if ($order['shipping_address']==!null) {
                $this->info("Inserting/updating shipping address with id: ".$order['shipping_address']['id']);
                $dbItems = CustomerAddress::findOrNew($order['shipping_address']['id']);
                $dbItems->fill($order['shipping_address'])->save();
            }

            if (is_array($order['items'])) {
                foreach ($order['items'] as $item) {
                    $dbItem = Product::findOrNew($item['id']);
                    $dbItem->fill($item)->save();
                }
            }
        }
    }
}
