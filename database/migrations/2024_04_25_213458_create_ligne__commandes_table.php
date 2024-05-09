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
        Schema::create('ligne__commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_var_option_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('product_var_option_id')->references('id')->on('product_vartion_options')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne__commandes');
    }
};
