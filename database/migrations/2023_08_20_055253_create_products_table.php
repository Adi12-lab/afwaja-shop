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
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("brand_id")->nullable();
            $table->string("name");
            $table->string("slug");
            $table->mediumText("small_description")->nullable();
            $table->longText("description")->nullable();
            $table->tinyInteger("isNew")->default("0")->comment("1=new, 0=old");
            $table->tinyInteger("status")->default("0")->comment("1=hidden, 0=visible");
            
            $table->string("meta_title")->nullable();
            $table->mediumText("meta_keyword")->nullable();
            $table->mediumText("meta_description")->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); //jika categoy dihapus maka produk ini akan dihapus
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');//jika brand dihapus maka produk ini akan dihapus
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
