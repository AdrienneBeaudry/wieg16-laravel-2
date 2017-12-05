<?php

namespace App\Console\Commands;

use App\Group;
use App\GroupePrice;
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
        
        foreach ($result as $category) {

            foreach ($category['products'] as $product) {
                $this->info("Inserting/updating product with sku: ".$product['sku']);
                $dbProduct = Product::findOrNew($product['sku']);
                $dbProduct->fill($product)->save();

                if (is_array($product['group_prices'])) {
                    $this->info("Inserting/updating group prices");
                    foreach ($product['group_prices'] as $groupP) {
                        $this->info("Inserting/updating Group Price with price ID: ". $groupP['price_id']);
                        $dbGroupP = GroupePrice::findOrNew($groupP['price_id']);
                        $dbGroupP->fill($groupP)->save();
                    }
                }
            }

            foreach ($category['groups'] as $group) {
                $this->info("Inserting/updating group with id:" . $group['customer_group_id']);
                $dbGroup = Group::findOrNew($group['customer_group_id']);
                $dbGroup->fill($groupP)->save();
            }

        }
    }
}
