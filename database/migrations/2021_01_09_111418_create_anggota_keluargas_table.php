<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('umur', 3)->nullable();
            $table->enum('ktp', ['YA', 'TIDAK'])->nullable();
            $table->enum('npwp', ['YA', 'TIDAK'])->nullable();
            $table->string('pendidikan', 100)->nullable();
            $table->enum('menikah', ['YA', 'TIDAK'])->nullable();
            $table->enum('pindah', ['YA', 'TIDAK'])->nullable();
            $table->enum('pisah', ['YA', 'TIDAK'])->nullable();
            $table->string('penghasilan', 100)->nullable();
            $table->string('status_keluarga', 100);
            $table->string('pekerjaan', 100)->nullable();
            $table->longText('keterangan_pekerjaan')->nullable();
            $table->foreignId('keluarga_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('anggota_keluargas');
    }
}
