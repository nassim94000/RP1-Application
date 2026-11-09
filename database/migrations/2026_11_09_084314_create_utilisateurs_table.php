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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id('utilisateur_id');
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('email', 255)->unique();   //email unique
            $table->enum('fonction', ['operationnel', 'chef de projet', 'ressources humaines']);
            $table->string('mdp', 255);
            $table->timestamps();
        });

        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
