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
        Schema::create('forklifts', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouse');
            $table->string('status')->default('wait');
            $table->date('last_to')->useCurrent();
            $table->string('position')->default(null)->nullable();
            $table->bigInteger('task_id')->default(null)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forklifts');
    }
};
