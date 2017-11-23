<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportCustomer extends Command {
    public function __construct()
    {
        parent::__construct();
    }

    public function handle () {
        /*
       $customer = Customer::find(1);
       $customer = new Customer();
       $customer->firstname = "Karl Marcus";
       $customer->fill([
           "id" => 2,
           "firstname" => "Marcus",
           "lastname" => "Dalgren",
           //etc.
       ]);
       $customer->save();
        //$customer->delete();
        $this->info($customer->toJson());
        */

        //Will fetch all rows in phones at once
        // Will only execute two calls to db in total
        $users_with = User::with('phone')->all();

        $users = User::all();
        $post = Post::find(1);
        $post->comments()->where("user_id","=", 1);
        $post->comments;
        foreach ($users as $user){
            // the below connects with db
            $user->phone->phone_number;
            $user->comments;
        }
    }
}

