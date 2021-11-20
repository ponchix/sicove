<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conductor')
            ->nullable()
            ->constrained('conductors')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('vehiculo')
            ->nullable()
            ->constrained('vehiculos')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->date('fecha_a');
            $table->date('fecha_e')->nullable();
            $table->float('odometro_a');
            $table->float('odometro_e')->nullable();
            $table->float('combustible_a');
            $table->float('combustible_e')->nullable();
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
        Schema::dropIfExists('assignments');
    }
}
