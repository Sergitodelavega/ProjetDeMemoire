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
        Schema::create('doctorants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('specialite');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('encadreur_id');
            $table->string('laboratoire');
            $table->string('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctorants');
    }
};
