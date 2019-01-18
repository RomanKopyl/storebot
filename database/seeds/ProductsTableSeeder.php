<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Apple iPhone X 256Gb Silver',
            'photo' => 'https://brain.com.ua/static/images/prod_img/6/2/U0268462_big.jpg',
            'description' => 'Мобільний телефон Apple iPhone XR 256GB blue. Особливості
            пилозахист корпусу, IP67, Face ID, oleophobic coating, Qi wireless charging, 3D Touch, Apple Pay',
            'category' => 'phone',
            'category_id' => '1',
            'price' => '25000',
        ]);
        DB::table('products')->insert([
            'name' => 'MOTOROLA MOTO G5',
            'photo' => 'https://brain.com.ua/static/images/prod_img/1/0/U0240310_big.jpg',
            'description' => 'Процесор Qualcomm MSM8937 Snapdragon 430 Частота процесора 1.4 GHz Кількість ядер 8 core',
            'category' => 'phone',
            'category_id' => '1',
            'price' => '35000',
        ]);
        DB::table('products')->insert([
            'name' => 'phone Nokia',
            'photo' => 'https://brain.com.ua/static/images/prod_img/2/4/U0257824_big.jpg',
            'description' => 'Nokia 105. Особливості: Corning Gorilla Glass 5, 3D Touch, Always-on display, IP68 certified, Samsung Pay. Вбудовані датчики: гіроскоп, SpO2, датчик наближення, Iris scanner, G-sensor, цифровий компас, барометр, heart rate',
            'category' => 'phone',
            'category_id' => '1',
            'price' => '7325',
        ]);
        DB::table('products')->insert([
            'name' => 'Samsung',
            'photo' => 'https://brain.com.ua/static/images/prod_img/0/7/U0286207_big.jpg',
            'description' => 'Samsung A750F Galaxy A7 2018',
            'category' => 'phone',
            'category_id' => '1',
            'price' => '12000',
        ]);
        DB::table('products')->insert([
            'name' => 'TV Samsung',
            'photo' => 'https://brain.com.ua/static/images/prod_img/1/6/U0311416_big.jpg',
            'description' => 'Samsung 65 Inch 4K Curved Ultra',
            'category' => 'TV',
            'category_id' => '2',
            'price' => '65536',
        ]);
        DB::table('products')->insert([
            'name' => 'TV LG',
            'photo' => 'https://brain.com.ua/static/images/prod_img/6/6/U0298066_big.jpg',
            'description' => 'LG Electronics OLED55B8PUA 55-Inch 4K Ultra HD Smart OLED TV (2018 Model)',
            'category' => 'TV',
            'category_id' => '2',
            'price' => '31415',
        ]);
        DB::table('products')->insert([
            'name' => 'Lenovo 14',
            'photo' => 'https://brain.com.ua/static/images/prod_img/4/7/U0306947_big.jpg',
            'description' => 'Lenovo 14" ThinkPad X1 Yoga Multi-Touch 2-in-1 Laptop',
            'category' => 'notebook',
            'category_id' => '3',
            'price' => '27182',
        ]);
        DB::table('products')->insert([
            'name' => 'Lenovo i7',
            'photo' => 'https://brain.com.ua/static/images/prod_img/3/4/U0303034_big.jpg',
            'description' => 'Lenovo ThinkPad T580 (i7-8650U, FHD) Laptop Review - NotebookCheck.net Reviews',
            'category' => 'notebook',
            'category_id' => '3',
            'price' => '27182',
        ]);
        DB::table('products')->insert([
            'name' => 'Asus Zenfone 2',
            'photo' => 'https://brain.com.ua/static/images/prod_img/7/2/U0275272_big.jpg',
            'description' => 'Asus Zenfone 2 ZE551ML (4GB RAM, 32GB, 2.3GHz) Price in India, Full Specs',
            'category' => 'phone',
            'category_id' => '1',
            'price' => '13666',
        ]);
        DB::table('products')->insert([
            'name' => 'XIAOMI REDMI NOTE 6 PRO 4',
            'photo' => 'https://brain.com.ua/static/images/prod_img/4/4/U0326444_big.jpg',
            'description' => 'процесор процесор Qualcomm SDM636 Snapdragon 636 Частота процесора 1.8 GHz кількість ядер 8 core',
            'category' => 'notebook',
            'category_id' => '1',
            'price' => '33333',
        ]);
    }
}
