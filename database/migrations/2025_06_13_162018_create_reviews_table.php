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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('rating'); // 1–5, por ejemplo
    	    $table->text('comment')->nullable();
    	    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    	    $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
    	    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
