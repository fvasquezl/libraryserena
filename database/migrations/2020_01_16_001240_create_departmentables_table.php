<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departmentables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('departmentable_id');
            $table->string('departmentable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentables');
    }
}
