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
        Schema::create('vendor_business_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained()->cascadeOnDelete();
            $table->string('shop_name')->nullable();
            $table->string('shop_address')->nullable();
            $table->tinyInteger('shop_city')->nullable();
            $table->tinyInteger('shop_district')->nullable();
            $table->tinyInteger('shop_thana')->nullable();
            $table->tinyInteger('shop_union')->nullable();
            $table->string('shop_pincode')->nullable();
            $table->string('shop_mobile')->nullable();
            $table->string('shop_website')->nullable();
            $table->string('shop_email')->nullable();
            $table->string('shop_licence')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_business_details');
    }
};
