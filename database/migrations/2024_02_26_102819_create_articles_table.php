<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('media');
            $table->string('author')->nullable();
            $table->string('credit')->nullable();
            $table->string('url');
            $table->text('content');
            $table->boolean('autoplay')->default(true);
            $table->boolean('featured')->default(false);
            $table->boolean('special')->default(false);
            $table->dateTime('date')->default(DB::raw('CURRENT_DATE'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
