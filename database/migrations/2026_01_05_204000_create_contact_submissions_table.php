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
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('interest'); // Silver|Gold|Platinum|Project
            $table->string('company_size'); // >$50M Revenue|>$100M Revenue|>$1B Revenue

            $table->string('name');
            $table->string('title');
            $table->string('company');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('challenge');

            $table->string('status')->default('new'); // new|reviewing|qualified|declined|closed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};
