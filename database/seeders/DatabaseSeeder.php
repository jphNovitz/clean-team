<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        \App\Models\MissingProducts::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
