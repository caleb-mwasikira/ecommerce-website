<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Category;
use App\Models\Media;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // On every seeding run,
        // start by deleting data from all the tables.
        User::truncate();
        Address::truncate();
        Category::truncate();
        Order::truncate();
        OrderItem::truncate();
        Media::truncate();
        Product::truncate();
        ShoppingCart::truncate();
        Transaction::truncate();

        Address::factory(10)->create();
        User::factory(20)->create();
        Category::factory(10)->create();
        Order::factory(20)->create();
        Media::factory(20)->create();
        Product::factory(20)->create();
        OrderItem::factory(50)->create();
        ShoppingCart::factory(20)->create();
        Transaction::factory(20)->create();
    }
}
