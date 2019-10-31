<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_employees', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('competency_id')->nullable();
            $table->unsignedBigInteger('detail_id');
            $table->decimal('score', 8, 2)->default(0);

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('competency_id')->references('id')->on('competencies')->onDelete('set null');
            $table->foreign('detail_id')->references('id')->on('details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_employees');
    }
}
