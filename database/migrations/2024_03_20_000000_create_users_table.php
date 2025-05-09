<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['influencer', 'company']);
            $table->string('phone', 10);
            $table->string('city');
            $table->string('state');
            $table->string('payment_info')->nullable();
            $table->string('pan', 10)->nullable();
            $table->string('primary_niche')->nullable();
            $table->string('secondary_niche')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_picture')->nullable();
            $table->json('social_platforms')->nullable();
            $table->json('social_handles')->nullable();
            $table->json('followers_count')->nullable();
            $table->json('social_links')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('brand_category')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->string('gst', 15)->nullable();
            $table->string('logo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}; 