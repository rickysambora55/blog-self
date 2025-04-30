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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('email', 255)->unique();
            $table->string('title', 255);
            $table->text('bio');
            $table->string('filename1')->unique();
            $table->string('filename2')->unique();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->string('github_username')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
