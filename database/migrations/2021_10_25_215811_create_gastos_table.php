<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('concepto');
            $table->string('referencia');
            $table->float('monto');
            $table->foreignId('vehiculo')
            ->nullable()
            ->constrained('vehiculos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->string('conductor');
            $table->string('proveedor');
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
        Schema::dropIfExists('gastos');
    }
}
