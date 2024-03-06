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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banner_slider_id');
            $table->string('title');
            $table->string('video');
            $table->string('poster')->nullable();
            $table->boolean('show')->default(true);
            $table->string('logo')->nullable();
            $table->string('time_slot')->nullable();
            $table->string('slug')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('link')->nullable();
            $table->boolean('image_logo')->nullable();
            $table->integer('logo_width')->nullable();
            $table->foreign('banner_slider_id')->references('id')->on('banner_sliders')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
