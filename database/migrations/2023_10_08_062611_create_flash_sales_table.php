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
        Schema::create('flash_sales', function (Blueprint $table) {
            $table->engine = 'innoDB';
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->integer("price");
            $table->boolean("isActive")->default(true)->comment("1=active, 0=false");
            $table->dateTime("deadline");
            $table->string("image1")->nullable();
            $table->string("image2")->nullable();
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flash_sale_tables');
    }
};
