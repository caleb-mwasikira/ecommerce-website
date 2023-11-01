<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Category;
use App\Models\ClothingDescription;
use App\Models\Inventory;
use App\Models\Media;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
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
        Inventory::truncate();
        Review::truncate();
        ClothingDescription::truncate();

        Address::factory(20)->create();
        User::factory(20)->create();
        Category::factory(10)->create();
        Order::factory(50)->create();
        Media::factory(50)->create();
        Product::factory(50)->create();
        OrderItem::factory(100)->create();
        ShoppingCart::factory(100)->create();
        Transaction::factory(50)->create();
        Inventory::factory(50)->create();
        Review::factory(100)->create();
        ClothingDescription::factory(50)->create();
    }
}
