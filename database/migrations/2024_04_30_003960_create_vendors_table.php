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


        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
