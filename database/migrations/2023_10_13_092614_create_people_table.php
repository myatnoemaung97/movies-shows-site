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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->date('birthday')->nullable();
            $table->string('country')->nullable();
            $table->integer('height')->nullable();
            $table->string('roles')->nullable();
            $table->text('')
            $table->longText('biography')->nullable();
            $table->string('image')->default('/storage/image-placeholder.jpg');
            $table->string('thumbnail')->default('/storage/cele-thumbnail.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
