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
        Schema::create('utilisateur_tache', function (Blueprint $table) {
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('tache_id');

            $table->foreign('utilisateur_id')->references('utilisateur_id')->on('utilisateurs')->cascadeOnDelete();
            $table->foreign('tache_id')->references('tache_id')->on('taches')->cascadeOnDelete();

            $table->primary(['utilisateur_id','tache_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur_tache');
    }
};
