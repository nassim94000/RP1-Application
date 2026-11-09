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
        Schema::create('utilisateur_groupe', function (Blueprint $table) {
            
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('groupe_id');

            $table->boolean('est_admin');

            $table->foreign('utilisateur_id')->references('utilisateur_id')->on('utilisateurs')->cascadeOnDelete();
            $table->foreign('groupe_id')->references('groupe_id')->on('groupes')->cascadeOnDelete();

            $table->primary(['utilisateur_id','groupe_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur_groupe');
    }
};
