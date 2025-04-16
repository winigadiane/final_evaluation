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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->text("description_experience");
            $table->string("photo_profil");
            $table->string("nom_auteur");
            $table->string("description_auteur");
            $table->string("date_publication");
            $table->unsignedInteger("nombre_like")->default(0);
            $table->unsignedBigInteger('utilisateurs_id');
            $table->foreign('utilisateurs_id')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
