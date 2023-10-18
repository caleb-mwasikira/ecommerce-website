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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("trans_id")->unique();
            $table->timestamp("time");
            $table->decimal("amount");
            $table->string("business_short_code");
            $table->string("bill_ref_no");
            $table->string("tel_no");
            $table->string("firstname");
            $table->string("middlename");
            $table->string("lastname");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
