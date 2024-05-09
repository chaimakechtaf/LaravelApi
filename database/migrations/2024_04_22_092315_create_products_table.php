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
        $table->string('nom');
        $table->decimal('old_price', 10, 2);
        $table->string('image');
        $table->text('description')->nullable();
        $table->string('slug');
        $table->boolean('facture');
        $table->boolean('instock');
        $table->string('categories')->nullable(); // Ajoutez '->nullable()' pour permettre la valeur NULL
        $table->string('souscategorie')->nullable(); // Ajoutez '->nullable()' pour permettre la valeur NULL
        $table->string('variation')->nullable();
        $table->string('variation_option')->nullable();
        $table->decimal('option_price', 10, 2)->nullable();

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
