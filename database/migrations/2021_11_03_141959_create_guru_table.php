<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->string('id', 7);
            $table->string('nama_guru', 55);
            $table->string('slug', 60);
            $table->string('jabatan', 20);
            $table->string('alamat', 100);
            $table->string('tempat_lahir', 20);
            $table->date('tanggal_lahir');
            $table->string('agama', 5);
            $table->string('jk', 9);
            $table->string('foto');
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
        Schema::dropIfExists('guru');
    }
}