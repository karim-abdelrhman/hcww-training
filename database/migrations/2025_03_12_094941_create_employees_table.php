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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('LUCOMPANIES' , 'ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('country_code'); // Match VARCHAR2 type
            $table->foreign('country_code')->references('COUNTRY_CODE')->on('COUNTRIES')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('organization_id')->constrained('LUORGUNITS' , 'ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('position_id')->constrained('LUPOSITIONS' , 'ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('employee_type_id')->constrained('EMPLOYEE_TYPES' , 'ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('career_path_id')->constrained('LUCAREERPATHS' , 'ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('degree_id')->constrained('LUDEGREES' , 'ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('job_id')->constrained('LUJOBS' , 'ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('grade_id')->constrained('LUGRADES' , 'ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('faculty_id')->constrained('LUFACULTIES' , 'ID')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('code');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('id_number');
            $table->string('email');
            $table->string('address');
            $table->string('image')->nullable();
            $table->boolean('active')->default(true);
            $table->date('birth_date')->nullable();
            $table->string('gender');
            $table->string('religion');
            $table->string('insurance_number');
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
        Schema::dropIfExists('employees');
    }
};
