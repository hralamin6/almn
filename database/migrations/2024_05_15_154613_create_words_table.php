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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(1)->constrained()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('with_harakah')->nullable();
            $table->string('meaning')->nullable();
            $table->string('gender')->nullable();
            $table->string('plural')->nullable();
            $table->string('pop')->nullable();
            $table->text('data')->nullable();
            $table->string('status')->nullable()->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
