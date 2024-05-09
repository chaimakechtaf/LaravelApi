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
        Schema::create('methode__paiements', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('numero');
            $table->date('expiration');
            $table->string('titulaire');
            $table->unsignedBigInteger('paiement_id');
            $table->foreign('paiement_id')->references('id')->on('paniers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('methode__paiements');
    }
};
