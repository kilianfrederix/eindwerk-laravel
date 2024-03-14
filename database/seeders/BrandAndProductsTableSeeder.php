<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandAndProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        DB::table('brands')->truncate();

        $brands = collect(['Bjorn Borg', 'Saye', 'Geox', 'Nike Sportswear', 'Adidas Performance']);
        $brands->each(fn($brand) => Brand::create(['name' => $brand]));

        $products = collect([
            [
                'name' => 'T305',
                'description' => 'Sneakers - laag',
                'price' => 69.95,
                'available_sizes' => range(40, 46),
                'brand_id' => 1,
                'image' => 'a9de6e44e6db43e198356be073511aea.jpg',
            ],
            [
                'name' => 'MODELO \'89',
                'description' => 'Sneakers - laag',
                'price' => 139.95,
                'available_sizes' => range(40, 46),
                'brand_id' => 2,
                'image' => 'e300aa2ab00247f0a1eb659fdb735aec.jpg',
            ],
            [
                'name' => 'DJROCK GIRL',
                'description' => 'Sneakers - laag',
                'price' => 54.95,
                'available_sizes' => range(24, 39),
                'brand_id' => 3,
                'image' => '496ced2e8704436995b848f501f969ff.jpg',
            ],
            [
                'name' => 'AF1 SHADOW',
                'description' => 'Sneakers - laag',
                'price' => 119.95,
                'available_sizes' => range(35, 43),
                'brand_id' => 4,
                'image' => '8239c1bdc60b44d39645802bbbb62d48.jpg',
            ],
            [
                'name' => 'AIR FORCE 1 \'07',
                'description' => 'Sneakers - laag',
                'price' => 94.95,
                'available_sizes' => range(35, 52),
                'brand_id' => 4,
                'image' => '90fbd7b11afd482abb081852ac1f0409.jpg',
            ],
            [
                'name' => 'COURT VINTAGE UNISEX',
                'description' => 'Sneakers - laag',
                'price' => 74.95,
                'available_sizes' => range(38, 49),
                'brand_id' => 4,
                'image' => '99c8c19a23bc43af8cf48629e7e2f153.jpg',
            ],
            [
                'name' => 'AIR FORCE 1 \'07',
                'description' => 'Sneakers - laag',
                'price' => 99.95,
                'available_sizes' => range(35, 52),
                'brand_id' => 4,
                'image' => '321557a3bc8446409957fc8da11d45c1.jpg',
            ],
            [
                'name' => 'AIR MAX 90',
                'description' => 'Sneakers - laag',
                'price' => 99.95,
                'available_sizes' => range(38, 48),
                'brand_id' => 4,
                'image' => '1e2b5e630efb49a6a0acf3f0ea22d378.jpg',
            ],
            [
                'name' => 'BLAZER MID \'77 UNISEX',
                'description' => 'Sneakers - hoog',
                'price' => 79.95,
                'available_sizes' => range(35, 40),
                'brand_id' => 4,
                'image' => '4d4b4d61eb784ae2976c2b9bc75f3fce.jpg',
            ],
        ]);

        $products->each(fn($product) => Product::create($product));
    }
}
