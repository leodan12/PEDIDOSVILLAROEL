<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdencomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    

    public function up()
    {
        Schema::create('ordencompras', function (Blueprint $table) {
            $table->id();
            $table->string('estadoOrden');
            $table->date('fechaorden');
            $table->string('lugar');
            $table->integer('idcliente');
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
        Schema::dropIfExists('ordencompras');
    }
}
