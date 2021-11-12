<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->time('hora_entrada');
            $table->foreignId('vehiculo')
            ->nullable()
            ->constrained('vehiculos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->float('odometro');
           // $table->string('servicios');
            $table->float('costo_partes');
            $table->float('mano_obra');
            $table->float('total');
            $table->string('referencia_man');
            $table->string('tipo_man');
            $table->string('proveedor');
            $table->string('comentario');
            $table->string('imagen_man');
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
        Schema::dropIfExists('mantenimientos');
    }
}
