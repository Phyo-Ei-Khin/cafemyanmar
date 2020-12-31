<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 7 ; $i++){
        Product::create([
            'name' => 'Coffee'. $i,
            'slug' => 'coffee'. $i,
            'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed incidunt deleniti culpa sint? Tempore quisquam vero reiciendis, ratione quasi aliquam atque molestiae! Veniam excepturi facilis voluptate unde aliquid. Debitis, minus.',
            'price' => 1000,
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae dolore eaque molestias voluptatem, voluptate accusamus reprehenderit maxime labore non quo? Harum pariatur obcaecati enim qui vero ad ut veritatis itaque!',
            // 'category_id' => 1,
        ])->categories()->attach(1);
        }

        $product = Product::find(1);
        $product->categories()->attach(2);

        for($i = 1; $i <= 3 ; $i++){
        Product::create([
            'name' => 'Cake'. $i,
            'slug' => 'cake'. $i,
            'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed incidunt deleniti culpa sint? Tempore quisquam vero reiciendis, ratione quasi aliquam atque molestiae! Veniam excepturi facilis voluptate unde aliquid. Debitis, minus.',
            'price' => 1000,
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae dolore eaque molestias voluptatem, voluptate accusamus reprehenderit maxime labore non quo? Harum pariatur obcaecati enim qui vero ad ut veritatis itaque!',
            // 'category_id' => 1,
        ])->categories()->attach(2);
        }
        for($i = 1; $i <= 4 ; $i++){
        Product::create([
            'name' => 'Juice'. $i,
            'slug' => 'juice'. $i,
            'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed incidunt deleniti culpa sint? Tempore quisquam vero reiciendis, ratione quasi aliquam atque molestiae! Veniam excepturi facilis voluptate unde aliquid. Debitis, minus.',
            'price' => 1000,
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae dolore eaque molestias voluptatem, voluptate accusamus reprehenderit maxime labore non quo? Harum pariatur obcaecati enim qui vero ad ut veritatis itaque!',
            // 'category_id' => 1,
        ])->categories()->attach(3);
        }
        for($i = 1; $i <= 2 ; $i++){
        Product::create([
            'name' => 'Ice Cream'. $i,
            'slug' => 'ice-cream'. $i,
            'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed incidunt deleniti culpa sint? Tempore quisquam vero reiciendis, ratione quasi aliquam atque molestiae! Veniam excepturi facilis voluptate unde aliquid. Debitis, minus.',
            'price' => 1000,
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae dolore eaque molestias voluptatem, voluptate accusamus reprehenderit maxime labore non quo? Harum pariatur obcaecati enim qui vero ad ut veritatis itaque!',
            // 'category_id' => 1,
        ])->categories()->attach(4);
        }
        for($i = 1; $i <= 5 ; $i++){
        Product::create([
            'name' => 'Bread'. $i,
            'slug' => 'bread'. $i,
            'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed incidunt deleniti culpa sint? Tempore quisquam vero reiciendis, ratione quasi aliquam atque molestiae! Veniam excepturi facilis voluptate unde aliquid. Debitis, minus.',
            'price' => 1000,
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae dolore eaque molestias voluptatem, voluptate accusamus reprehenderit maxime labore non quo? Harum pariatur obcaecati enim qui vero ad ut veritatis itaque!',
            // 'category_id' => 1,
        ])->categories()->attach(5);
        }
    }
}
