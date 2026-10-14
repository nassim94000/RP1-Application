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
        Schema::create('tache_utilisateur', function (Blueprint $table) {
            $table->unsignedBigInteger('id_utilisateur');
            $table->unsignedBigInteger('id_tache');
            
            $table->primary(['id_tache', 'id_utilisateur']);
            
            $table->foreign('id_utilisateur')
                    ->references('id_utilisateur')
                    ->on('utilisateurs')
                    ->onDelete('cascade');
                    
            $table->foreign('id_tache')
                    ->references('id_tache')
                    ->on('taches')
                    ->onDelete('cascade');
                    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tache_utilisateur');
    }
};
