<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudulTugasAkhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judul_tugas_akhir', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nim', 8);
            $table->string('judul');
            $table->text('deskripsi');
            $table->text('manfaat');
            $table->enum('status_ta', ['menunggu', 'ditolak', 'diterima']);
            $table->timestamps();

            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas_akhir');
    }
}
