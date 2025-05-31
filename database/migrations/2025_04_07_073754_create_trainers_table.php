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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('id_number')->unique();
            $table->string('id_image')->unique();
            $table->string('qualification');
            $table->string('degree');
            $table->string('university');
            $table->string('position');
            $table->enum('accreditation_type', ['فني', 'مالي' , 'قانوني'  , 'it' , 'أخري']);
            $table->enum('accreditation_category', ['دكتوراه', 'ماجيستير' , 'مستشار متخصص']);
            $table->string('interview_evaluation');
            $table->string('coach_accreditation');
            $table->string('coach_accreditation_number');
            $table->date('coach_accreditation_date');
            $table->string('letter_of_attribution');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
