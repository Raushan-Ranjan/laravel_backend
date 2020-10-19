<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvuploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csvupload', function (Blueprint $table) {
            $table->increments('id');
            $table->string('motor_controller_type_id');
            $table->string('controller_id');
            $table->string('lot_no');
            $table->string('has_uart');
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
        Schema::dropIfExists('csvupload');
    }
}
