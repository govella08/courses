<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelativeStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('relative_student', function (Blueprint $table)
      {
        $table->id();
        $table->bigInteger('relative_id')->unsigned();
        $table->bigInteger('student_id')->unsigned();
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
        //
    }
}
