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
            'photo' => 'https://rozetka.com.ua/ua/apple_iphone_x_256gb_silver/p22726287/',
            'description' => 'Мобільний телефон Apple iPhone XR 256GB blue',
            'category' => 'phone',
            'price' => '25000',
        ]);
        DB::table('products')->insert([
            'name' => 'iphone2',
            'photo' => 'https://www.imore.com/sites/imore.com/files/styles/xlarge_wm_blw/public/field/image/2018/01/iphone-x-stack.jpg?itok=F63p-wZf',
            'description' => 'Мобільний телефон Apple iPhone 512GB yellow',
            'category' => 'phone',
            'price' => '35000',
        ]);
        // DB::table('products')->insert([
        //     'name' => 'phone',
        //     'photo' => 'https://www.google.com.ua/search?q=nokia&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjGpNO9wO_fAhWB2CwKHdMyBz4Q_AUIDigB&biw=1280&bih=838#imgrc=Igh3wCfCi0n4QM:',
        //     'description' => 'Nokia 105',
        //     'category' => 'phone',
        //     'price' => '7325',
        // ]);
        // DB::table('products')->insert([
        //     'name' => 'Samsung',
        //     'photo' => 'https://www.google.com.ua/search?biw=1280&bih=882&tbm=isch&sa=1&ei=36s9XLTNPIeTsAHLiIyACw&q=samsung&oq=samsung&gs_l=img.3..0i67l7j0j0i67j0.102032.103514..104301...0.0..0.99.666.7......0....1..gws-wiz-img.uFN3yU1dkbE#imgrc=ZQNw2CnVPKsBpM:',
        //     'description' => 'Samsung A750F Galaxy A7 2018',
        //     'category' => 'phone',
        //     'price' => '12000',
        // ]);
        // DB::table('products')->insert([
        //     'name' => 'TV Samsung',
        //     'photo' => 'https://www.google.com.ua/search?biw=1280&bih=882&tbm=isch&sa=1&ei=Saw9XID8Ho-GwPAP-Pq8sAY&q=samsung+tv&oq=samsung+tv&gs_l=img.3..0l2j0i30l8.60441.61992..63338...0.0..0.114.300.2j1......0....1..gws-wiz-img.......0i67.VaBvnHZxNh0#imgrc=yIWr8I0GxRwqbM:',
        //     'description' => 'Samsung 65 Inch 4K Curved Ultra',
        //     'category' => 'TV',
        //     'price' => '65536',
        // ]);
        // DB::table('products')->insert([
        //     'name' => 'TV LG',
        //     'photo' => 'https://www.google.com.ua/search?biw=1280&bih=882&tbm=isch&sa=1&ei=iqw9XI2sKabqrgTm8ZGYAw&q=lg+tv&oq=lg+tv&gs_l=img.3..0j0i7i30l9.452746.453131..453851...0.0..0.120.308.2j1......0....1..gws-wiz-img.......0i19j0i10i19j0i7i30i19.fQ3QSYwHYK8#imgrc=pPE1tfrOxK2uJM:',
        //     'description' => 'LG Electronics OLED55B8PUA 55-Inch 4K Ultra HD Smart OLED TV (2018 Model)',
        //     'category' => 'TV',
        //     'price' => '31415',
        // ]);
        // DB::table('products')->insert([
        //     'name' => 'Lenovo 14',
        //     'photo' => 'https://www.google.com.ua/search?biw=1280&bih=882&tbm=isch&sa=1&ei=Ha89XOKLAY_HrgSO3YfoDw&q=lenovo+notebook&oq=lenovo+notebook&gs_l=img.3.6.0j0i30l9.61010.1463312..1465488...1.0..0.233.952.3j4j1......0....1j2..gws-wiz-img.......0i67j0i19.RJvHYo_m2kk#imgrc=BPBr8B2OYHAT_M:',
        //     'description' => 'Lenovo 14" ThinkPad X1 Yoga Multi-Touch 2-in-1 Laptop',
        //     'category' => 'notebook',
        //     'price' => '27182',
        // ]);
        // DB::table('products')->insert([
        //     'name' => 'Lenovo i7',
        //     'photo' => 'https://www.google.com.ua/search?biw=1280&bih=882&tbm=isch&sa=1&ei=Ha89XOKLAY_HrgSO3YfoDw&q=lenovo+notebook&oq=lenovo+notebook&gs_l=img.3.6.0j0i30l9.61010.1463312..1465488...1.0..0.233.952.3j4j1......0....1j2..gws-wiz-img.......0i67j0i19.RJvHYo_m2kk#imgrc=EoegAtuSZqsOvM:',
        //     'description' => 'Lenovo ThinkPad T580 (i7-8650U, FHD) Laptop Review - NotebookCheck.net Reviews',
        //     'category' => 'notebook',
        //     'price' => '27182',
        // ]);
        // DB::table('products')->insert([
        //     'name' => 'Asus Zenfone 2',
        //     'photo' => 'https://www.google.com.ua/search?biw=1280&bih=882&tbm=isch&sa=1&ei=17Q9XJD0KIXvrgSI7r3QDw&q=asus&oq=%D1%84%D1%96%D0%B3%D1%96&gs_l=img.3.0.0i10j0i10i24l2j0i24l2j0i10i24j0i24l3j0i10i24.14842.20105..21692...0.0..0.240.634.0j3j1......0....1..gws-wiz-img.....0..0.Eeka2oPAdV0#imgrc=8IMjm02MVBPLhM:',
        //     'description' => 'Asus Zenfone 2 ZE551ML (4GB RAM, 32GB, 2.3GHz) Price in India, Full Specs',
        //     'category' => 'phone',
        //     'price' => '13666',
        // ]);
        DB::table('products')->insert([
            'name' => 'ASUS ROG STRIX',
            'photo' => 'https://www.excaliberpc.com/675442/asus-rog-strix-gl503ge-rs71-scar.html#gallery-1',
            'description' => 'ASUS ROG STRIX GL503GE-RS71 (SCAR Edition) 15.6" 120Hz (3ms) Full HD Gaming Laptop w',
            'category' => 'notebook',
            'price' => '33333',
        ]);
    }
}
