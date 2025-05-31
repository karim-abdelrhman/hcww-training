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
        Schema::table('employees', function (Blueprint $table) {
//           $table->dropForeign(['employee_type_id']);
           $table->after('insurance_number' , function ($table) {
               $table->integer('age')->nullable();
               $table->string('cv')->nullable();
               $table->string('job_description_card')->nullable();
               $table->string('contract_type')->nullable();
               $table->date('employment_date')->nullable();
           });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
