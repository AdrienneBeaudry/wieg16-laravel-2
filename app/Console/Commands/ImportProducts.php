<?php

namespace App\Console\Commands;

use App\Group;
use App\GroupePrice;
use App\Product;
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


        foreach ($json['products'] as $product) {

            $this->info("Looping through products...");

            $this->info("Inserting/updating product with id: ".$product['entity_id']);
            $dbProduct = Product::findOrNew($product['entity_id']);
            $dbProduct->fill($product)->save();

            die();

            
            $this->info("Looping through group prices...");
            foreach ($product['group_prices'] as $groupP) {
                $this->info("Inserting/updating Group Price with price ID: ". $groupP['price_id']);
                $dbGroupP = GroupePrice::findOrNew($groupP['price_id']);
                $dbGroupP->fill($groupP)->save();
            }

            foreach ($category as $group) {
                $this->info("Inserting/updating group with id:" . $group['customer_group_id']);
                $dbGroup = Group::findOrNew($group['customer_group_id']);
                $dbGroup->fill($groupP)->save();
            }
        }
    }
}
