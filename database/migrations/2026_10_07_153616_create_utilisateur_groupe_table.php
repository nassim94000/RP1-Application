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
            $table->unsignedBigInteger('id_groupe');
            $table->unsignedBigInteger('id_utilisateur');
            $table->date('date_inscription')->useCurrent();
            $table->boolean('est_admin')->default(false);
            
            $table->primary(['id_groupe', 'id_utilisateur']);
            
            $table->foreign('id_groupe')
                    ->references('id_groupe')
                    ->on('groupes')
                    ->onDelete('cascade');
                        
            $table->foreign('id_utilisateur')
                    ->references('id_utilisateur')
                    ->on('utilisateurs')
                    ->onDelete('cascade');
                    
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
