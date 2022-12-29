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

        // \App\Models\Product::factory(10)->create();
        $linens = [
            "Drap de lit", "couette", "Housse de couette",
            "Oreiller", "taie d'oreiller", "Couette deux personnes"
        ];
        $consummables = [
            "Produit vert", "produit pour les vitres", "Produit pour le sol"
        ];
        for ($i = 0; $i < sizeof($linens); $i++) {
            \App\Models\Product::factory(1)->create(['name' => $linens[$i], 'type_id' => 1]);
        }
        for ($i = 0; $i < sizeof($consummables); $i++) {
            \App\Models\Product::factory(1)->create(['name' => $consummables[$i], 'type_id' => 2]);
        }
        $users = User::all();
        $products = Product::all();

        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $journal = new MissingProducts();
            //var_dump(gettype($journal)); die; 
            //var_dump($journal->active()); 
            //$journal['active'] = $faker->boolean();
            //$journal['reported'] = $faker->boolean();
            $journal->product_id = $faker->numberBetween(1, 10);
            $journal->team_id = $faker->numberBetween(1, 10);

            if (false == $journal['active']) {
                $journal['quantity'] = $faker->numberBetween(1, 15);
            }
            $journal->save();
            $journal->users()->attach($users->find($faker->numberBetween(1, 10)));
            // $journal->product()->attach($products->find($faker->numberBetween(1, 10)));


        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
