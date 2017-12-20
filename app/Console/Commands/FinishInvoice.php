<?php

namespace App\Console\Commands;

use App\Order;
use DateInterval;
use DB;
use Illuminate\Console\Command;

class FinishInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'finish:invoice {invoice}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close invoice.';

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
        $invoice_id = $this->argument('invoice');
        $this->info("Closing invoice ID $invoice_id...");

        $invoice_date = date('Y-m-d');
        $due_date = date("Y-m-d", strtotime($invoice_date . "+30 days"));

        $orders = DB::table('orders')->where('invoice_id', '=', $invoice_id)->get();
        $orders = json_decode($orders, true);

        $this->info("Looping through orders and adding up totals...");
        $goods_total = 0;
        $goods_vat = 0;
        $shipping = 0;
        $shipping_vat = 0;
        foreach ($orders as $order) {
            $customer_id = $order['customer_id'];
            $goods_total += $order['subtotal'];
            $goods_vat += $order['tax_amount'];
            $shipping += $order['shipping_amount'];
            $shipping_vat += $order['shipping_tax_amount'];
        }
        $total_payable = $goods_total + $goods_vat + $shipping + $shipping_vat;

        $this->info("Generating invoice number...");
        $latest = DB::table('invoices')->max('invoice_number');
        if($latest !== null) {
            $yearInvoice = substr($latest, 0, 2);
            $serie = substr($latest, 2, 4);
            if ($yearInvoice === date('y')) {
                $serie++;
            }
            else {
                $yearInvoice = date('y');
                $serie = 1000;
            }
        }
        else {
            $yearInvoice = date('y');
            $serie = 1000;
        }
        $invoice_number = $yearInvoice . $serie;

        $this->info("Updating database...")
        DB::table('invoices')
            ->where('id', $invoice_id)
            ->update([
                'invoice_date' => $invoice_date,
                'due_date' => $due_date,
                'invoiced' => true,
                'customer_id' => $customer_id,
                'goods_total_excl_vat' => $goods_total,
                'goods_vat' => $goods_vat,
                'shipping_excl_vat' => $shipping,
                'shipping_vat' => $shipping_vat,
                'total_payable' => $total_payable,
                'invoice_number' => $invoice_number,
            ]);

        $this->info("Invoice $invoice_id: successfully updated.");
    }
}
