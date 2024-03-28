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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->default('user');
            $table->string('status')->default('active');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->tinyText('bio')->nullable();
            $table->string('email')->unique();
            $table->string('facebook')->default('facebook.com');
            $table->string('twitter')->default('twitter.com');
            $table->string('instagram')->default('instagram.com');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_seen')->default(now());
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
        Schema::dropIfExists('users');
    }
};
