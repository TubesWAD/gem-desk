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
        Schema::create('user_managements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('employee_id')->default('');
            $table->string('department_name')->default('');
            $table->enum('roles', ['user', 'admin'])->default('user');
            $table->string('mobile')->default('');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_picture')->default('');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_managements');
    }
};
