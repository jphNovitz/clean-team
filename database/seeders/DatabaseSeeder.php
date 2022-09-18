<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MissingProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker;

class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Team::factory(10)->create();
        \App\Models\Type::factory(2)->sequence([
            'name' => 'linen',
            'description' => 'linen description',
        ], [
            'name' => 'consumable',
            'description' => 'consumables description',
        ])->create();
       
        \App\Models\Product::factory(10)->create();
        $users = User::all();
        $products = Product::all();

    $faker = Faker\Factory::create();
        for ($i = 0  ; $i< 10; $i++){
            $journal = new MissingProducts();
            //var_dump($journal->active()); 
            //$journal['active'] = $faker->boolean();
            //$journal['reported'] = $faker->boolean();
            if (false == $journal['active']){
                $journal['quantity'] = $faker->numberBetween(1, 5);
           }
           $journal->save();

            $journal->users()->attach($users->find($faker->numberBetween(1, 10)));
            $journal->products()->attach($products->find($faker->numberBetween(1, 10)));
                

        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
