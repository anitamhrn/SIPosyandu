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
            // $table->foreignId('pelayanan_id');->reference('id')->on('pelayanan')->onDelete('cascade')
            $table->foreignId('balita_id')->constrained('balita')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('berat');
            $table->decimal('tinggi');
            $table->decimal('lingkar_lengan');
            $table->decimal('lingkar_kepala');
            $table->string('vitamin');
            $table->integer('orang_tua_id');
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
