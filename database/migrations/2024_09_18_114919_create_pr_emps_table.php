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
        Schema::create('pr_emps', function (Blueprint $table) {
            $table->bigIncrements('emp_id');
            $table->integer('comp_id');
            $table->string('code');
            $table->string('name');
            $table->string('national_no')->nullable();
            $table->string('id_no')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('mob1')->nullable();
            $table->string('mob2')->nullable();
            $table->string('contract_type');
            $table->string('relition')->nullable();
            $table->string('position')->nullable();
            $table->string('degree')->nullable();
            $table->string('org_unit')->nullable();
            $table->string('job')->nullable();
            $table->string('a_title')->nullable();
            $table->string('grade')->nullable();
            $table->string('insurance_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('nationality')->nullable();
            $table->string('active');
            $table->string('carer')->nullable();
            $table->string('dependable')->nullable();
            $table->date('dependable_date')->nullable();
            $table->string('tr_side')->nullable();
            $table->string('comptr')->nullable();
            $table->string('faculty')->nullable();
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
        Schema::dropIfExists('pr_emps');
    }
};
