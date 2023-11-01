<?php

use App\Models\Enums\ClothingSize;
use App\Models\Enums\Gender;
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
        Schema::create('clothing_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id");
            $table->text("body");
            $table->enum("size", array_column(ClothingSize::cases(), 'value'));
            $table->enum("gender", array_column(Gender::cases(), 'value'));
            $table->string("color")->nullable();
            $table->text("material")->nullable();
            $table->text("care_instructions")->nullable();
            $table->string("brand")->nullable();
            $table->string("country_of_origin")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothing_description');
    }
};
