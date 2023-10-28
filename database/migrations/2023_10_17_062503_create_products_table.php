<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->decimal("price", 8, 2, true);
            $table->text("description");
            $table->integer("quantity_in_stock", false, true)->default(0);
            $table->integer("reorder_point", false, true)->default(0);
            $table->foreignId("category_id");
            $table->foreignId("supplier_id");
            $table->foreignId("media_id");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
