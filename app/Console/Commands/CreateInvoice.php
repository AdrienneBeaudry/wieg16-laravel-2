<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Invoice;

class CreateInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an invoice';

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
        $this->info("Sending request...");
        $dbInvoice = Invoice::create();
        $this->info("New invoice created...");
        $dbInvoice->save();
    }
}
