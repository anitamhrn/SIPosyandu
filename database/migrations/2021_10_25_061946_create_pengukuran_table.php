<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengukuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengukuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwal')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('balita_id')->constrained('balita')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('berat_badan');
            $table->decimal('tinggi_badan');
            $table->decimal('lingkar_lengan');
            $table->decimal('lingkar_kepala');
            $table->string('vitamin');
            $table->string('asi_1');
            $table->string('asi_2');
            $table->string('asi_3');
            $table->string('asi_4');
            $table->string('asi_5');
            $table->string('asi_6'); 
            $table->string('catatan');
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
        Schema::dropIfExists('pengukuran');
    }
}