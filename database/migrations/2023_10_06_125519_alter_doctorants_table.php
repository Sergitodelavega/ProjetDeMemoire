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
        Schema::table('doctorants', function(Blueprint $table){
            $table->foreignId('encadreur_id');
            $table->string('laboratoire');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::table('doctorants', function(Blueprint $table){
            $table->dropColumn(['encadreur_id']);
            $table->dropColumn(['laboratoire']);
        }); 
    }
};
