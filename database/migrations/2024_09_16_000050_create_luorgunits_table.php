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
        Schema::create('luorgunits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('comm')->nullable();
            $table->unsignedBigInteger('comp_id')->nullable();
//            $table->foreign('comp_id')->references('id')->on('lucompanies')->onDelete('cascade');
            $table->string('parent_id')->nullable();
//            $table->foreign('parent_id')->references('id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luorgunits');
    }
};
