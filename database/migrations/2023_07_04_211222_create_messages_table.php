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
        // Schema::create('messanges', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('to');
        //     $table->string('subject');
        //     $table->string('message');
        //     $table->foreignId('user_id')->constrained('users');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messanges');
    }
};
