<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Aura Luxury Spa');
            $table->string('email')->default('contact@auraspa.com');
            $table->string('phone')->default('+880 1700-000000');
            $table->string('address')->default('Gulshan 2, Dhaka, Bangladesh');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('settings');
    }
};