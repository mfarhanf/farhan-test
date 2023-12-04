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
        Schema::create('claim_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->date('date');
            $table->integer('benefit_id');
            $table->text('description');
            $table->integer('amount');
            $table->integer('approval_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim_submissions');
    }
};
