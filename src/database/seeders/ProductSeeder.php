<?php

namespace Database\Seeders;

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
        'name' => 'いちご',
        'price' => 500,
        'image' => 'strawberry.jpg',
        'description' => '甘くて美味しいいちご'
    ]);
    }
}
