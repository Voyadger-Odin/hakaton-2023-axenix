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
        Schema::create('forklift_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('forklift_id');
            $table->foreign('forklift_id')->references('id')->on('forklifts')->onDelete('cascade');
            $table->string('status');
            $table->integer('length');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forklift_logs');
    }
};
