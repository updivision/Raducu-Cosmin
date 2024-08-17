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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'FASHION', 'BOOK', 'MUSIC'
            $table->string('name');
            $table->string('size')->nullable(); // Only for Fashion
            $table->string('brand')->nullable(); // Only for Fashion
            $table->json('gallery')->nullable(); // Only for Fashion
            $table->string('author')->nullable(); // Only for Books
            $table->string('image')->nullable(); // For both Books and Music
            $table->text('excerpt')->nullable(); // Only for Books
            $table->string('publisher')->nullable(); // Only for Books
            $table->string('artist')->nullable(); // Only for Music
            $table->string('media')->nullable(); // Only for Music
            $table->float('price');
            $table->float('discount')->nullable(); // Discount as a percentage (0.0 to 1.0)
            $table->integer('quantity')->nullable(); // Quantity in stock
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');

        
    }
};
