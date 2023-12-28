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
        Schema::create('incident_temps', function (Blueprint $table){
            $table->id();
//            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->integer('service_id');
            $table->string('incident');
            $table->string('probability');
            $table->integer('risk_quadrant');
            $table->string('risk_level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_temps');

    }
};
