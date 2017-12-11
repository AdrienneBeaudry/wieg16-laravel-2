<?php

namespace App\Console\Commands;

use App\Group;
use App\GroupePrice;
use App\GroupPrice;
use App\Product;
use DB;
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
        $this->info("Sending request...");
        $json = json_decode(file_get_contents("storage/app/products.json"), true);

        $this->info("Looping through groups...");
        foreach ($json['groups'] as $group) {
            $this->info("Inserting/updating group with id:" . $group['customer_group_id']);
            $group['id'] = $group['customer_group_id'];
            $dbGroup = Group::findOrNew($group['customer_group_id']);
            $dbGroup->fill($group)->save();
        }

        $this->info("Looping through products...");
        foreach ($json['products'] as $product) {
            $this->info("Inserting/updating product with id: ".$product['entity_id']);

            $dbProduct = Product::findOrNew($product['entity_id']);
            if (isset($product['stock_item']) && is_array($product['stock_item']))
                $product['stock_item'] = array_shift($product['stock_item']);
            $dbProduct->fill($product)->save();

            
            $this->info("Looping through group prices...");
            DB::table('group_prices')->where('product_id', '=', $product['entity_id'])->delete();
            foreach ($product['group_prices'] as $group) {
                $this->info("Inserting/updating Group Price with price ID: ". $group['price_id']);
                $group['product_id'] = $product['entity_id'];
                $dbGroupP = GroupPrice::create($group);
                //$dbGroupP->fill($group)->save();
            }
        }


    }
}
