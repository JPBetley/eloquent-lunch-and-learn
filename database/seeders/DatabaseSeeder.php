<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Login;
use App\Models\Order;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory()
            ->count(1000)
            ->has(
                User::factory()
                    ->count(50)
                    ->has(Login::factory()->count(50))
            )->create();

        Post::factory()
            ->count(1000)
            ->has(PostTag::factory())
            ->create();

        $store = Store::factory()->create();
        $categories = Category::factory()
            ->count(3)
            ->recycle($store)
            ->create();

        // Create products in categories
        $products = Product::factory()
            ->count(20)
            ->recycle($store)
            ->recycle($categories)
            ->create();

        // Generate orders using same products
        Order::factory()
            ->count(50)
            ->recycle($store)
            ->recycle($products)
            ->create()
            ->each(function ($order) use ($products) {
                // Add 1-5 random products to each order
                $orderProducts = $products->random(rand(1, 5));
                $order->products()->attach(
                    $orderProducts->pluck('id')->mapWithKeys(function ($id) {
                        return [$id => ['quantity' => rand(1, 5)]];
                    })
                );
            });
    }
}
