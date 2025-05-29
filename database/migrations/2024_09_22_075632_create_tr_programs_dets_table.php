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
        Schema::create('tr_programs_dets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('prog_id')->nullable();
            $table->string('materials')->nullable();
            $table->string('comm')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_programs_dets');
    }
};
