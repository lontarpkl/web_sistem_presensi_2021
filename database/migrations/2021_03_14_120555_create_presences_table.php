<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->id();

            $table->string("rfid_id");
            $table->date('tanggal');
            $table->time('jam')->nullable();
            $table->enum('kehadiran',['Tepat Waktu','Terlambat', 'Pulang Duluan']);
            $table->enum('keterangan',['Masuk','Pulang']);


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
        Schema::dropIfExists('presences');
    }
}
