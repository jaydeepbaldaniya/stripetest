<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Wallets',
            'description' => 'Men Casual Brown Genuine wallets',
            'price' => '100'
        ]);
        Product::create([
            'name' => 'Watch',
            'description' => 'CLUB Quartz Movement Analog Display Multicoloured Dial Men\'s Watch',
            'price' => '200'
        ]);
        Product::create([
            'name' => 'Sandal',
            'description' => 'Men Tan Sandal',
            'price' => '150'
        ]);
        Product::create([
            'name' => 'Belt',
            'description' => 'Men & Women Tan Canvas',
            'price' => '120'
        ]);
        Product::create([
            'name' => 'Kids cloth',
            'description' => 'Above Knee Casual Dress',
            'price' => '140'
        ]);
        Product::create([
            'name' => 'Dress',
            'description' => 'Casual Flared Sleeves',
            'price' => '180'
        ]);
        Product::create([
            'name' => 'Sunglasses',
            'description' => 'Mirrored Retro Square',
            'price' => '120'
        ]);
    }
}
