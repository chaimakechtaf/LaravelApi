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
        Schema::create('product_vartion_options', function (Blueprint $table) {
           
                $table->id();
                $table->string('var_option_name');
                $table->decimal('prix', 10, 2);
                $table->string('image');
                $table->integer('sku');
                $table->unsignedBigInteger('variation_option_id');
                $table->unsignedBigInteger('pr_a_id');
                $table->unsignedBigInteger('pr_v_id');

                //$table->foreignId('va_id')->nullable()->constrained('variation_options')->onDelete('cascade');
                $table->foreign('variation_option_id')->references('id')->on('product_variations');
                $table->foreign('pr_a_id')->references('id')->on('prix_achats')->onDelete('cascade');
                $table->foreign('pr_v_id')->references('id')->on('prix_ventes')->onDelete('cascade');
                $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_vartion_options');
    }
};
