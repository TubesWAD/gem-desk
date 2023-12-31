<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * profile
     * organization name
     * description
     * industry category
     * location
     * address
     * city
     * postal code
     * state
     * country
     * contact information
     * email ID
     * phone number
     * fax number
     * web url
     * company logo
     */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('deparment_name');
            $table->text('description');
            $table->string('bussiness_impact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
