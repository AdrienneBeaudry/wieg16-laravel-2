<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class ConnectInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'connect:invoice {invoice} {order}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connects an invoice to an order.';

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
        $order_id = $this->argument('order');
        $invoice_id = $this->argument('invoice');

        $this->info("Linking order ID $order_id with invoice ID $invoice_id...");
        $order['invoice_id'] = $invoice_id;

        DB::table('orders')
            ->where('id', $order_id)
            ->update(['invoice_id' => $invoice_id]);
        $this->info("Invoice number successfully saved to order record.");
    }
}
