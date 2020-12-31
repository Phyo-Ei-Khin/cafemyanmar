<?php

use App\Category;
use Carbon\Carbon;
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
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Coffee', 'slug' => 'coffee', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cake', 'slug' => 'cake', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Juice', 'slug' => 'juice', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ice Cream', 'slug' => 'ice_cream', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bread', 'slug' => 'bread', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
