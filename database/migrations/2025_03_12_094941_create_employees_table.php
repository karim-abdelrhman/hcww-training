<?php

use App\Models\EmployeeType;
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
            $table->foreignId('company_id')->constrained('companies' , 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('country_code'); // Match VARCHAR2 type
            $table->foreignId('organization_id')->constrained('orgunits' , 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('position_id')->constrained('positions' , 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(EmployeeType::class);
//            $table->foreignId('employee_type_id')->constrained('employee_types' , 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('career_path_id')->constrained('careerpaths' , 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('degree_id')->constrained('degrees' , 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('job_id')->constrained('jobs' , 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('grade_id')->constrained('grades' , 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('faculty_id')->constrained('faculties' , 'id')->cascadeOnDelete()->cascadeOnUpdate();
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
