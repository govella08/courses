<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('receipts', function (Blueprint $table) {
        $table->id();
        $table->string('number')->unique();
        $table->date('date')->nullable();
        $table->integer('amount')->unsigned();
        $table->bigInteger('student_id')->unsigned();
        $table->bigInteger('batch_id')->unsigned();
        $table->string('image');
        $table->timestamps();
        $table->integer('deleted')->default(0);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
