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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['non soumis', 'en attente', 'validée', 'rejetée']);
            $table->text('comment')->nullable();
            $table->string('semestre')->nullable();
            $table->integer('delai');
            $table->date('deadline')->nullable();
            $table->foreignId('doctorant_id');
            $table->foreignId('year_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
