<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemilikKartusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilik_kartus', function (Blueprint $table) {
            $table->id();
            $table->enum('kis', ['YA', 'TIDAK'])->nullable();
            $table->enum('bpjs', ['YA', 'TIDAK'])->nullable();
            $table->longText('lainnya')->nullable();
            $table->longText('riwayat_penyakit')->nullable();
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
        Schema::dropIfExists('pemilik_kartus');
    }
}
