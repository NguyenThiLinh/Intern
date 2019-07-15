<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('categories')->insert([
                'name' => "Oppo",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('categories')->insert([
                'name' => "SamSung",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('categories')->insert([
                'name' => "Apple",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        
    }
}
