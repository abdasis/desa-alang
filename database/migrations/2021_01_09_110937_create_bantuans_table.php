<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBantuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bantuans', function (Blueprint $table) {
            $table->id();
            $table->enum('pkh', ['YA', 'TIDAK'])->nullable();
            $table->enum('bpnt', ['YA', 'TIDAK'])->nullable();
            $table->enum('pertanian', ['YA', 'TIDAK'])->nullable();
            $table->enum('keagamaan', ['YA', 'TIDAK'])->nullable();
            $table->string('lainnya', 100)->nullable();
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
        Schema::dropIfExists('bantuans');
    }
}
