<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'phone',
        ]);
        DB::table('categories')->insert([
            'name' => 'TV',
        ]);
        DB::table('categories')->insert([
            'name' => 'notebook',
        ]);
    }
}
