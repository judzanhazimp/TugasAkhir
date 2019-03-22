<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip',20);
            $table->string('nama',150);
            $table->string('jk',1);
            $table->string('ttl',150);
            $table->string('alamat',150);
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
        Schema::dropIfExists('t_pegawai');
    }
}
