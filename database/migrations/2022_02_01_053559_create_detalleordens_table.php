<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleordensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleordens', function (Blueprint $table) {
            $table->id();
            $table->integer('idordencompra');
            $table->integer('idproducto');
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->string('unidad');
            $table->boolean('estado')->default(true);
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
        Schema::dropIfExists('detalleordens');
    }
}
