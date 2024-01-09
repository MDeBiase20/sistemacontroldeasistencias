<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();

            $table->string(column: 'nombre_apellido', length: 255);
            $table->string(column: 'direccion', length: 255);
            $table->string(column: 'telefono', length: 100);
            $table->string(column: 'fecha_nacimiento', length: 100);
            $table->string(column: 'genero', length: 50);
            $table->string(column: 'email', length: 255)->unique();
            $table->string(column: 'estado', length: 5);
            $table->string(column: 'ministerio', length: 255);
            $table->text(column: 'fotografia')->nulllable();
            $table->string(column: 'fecha_ingreso', length: 50);
            
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
        Schema::dropIfExists('miembros');
    }
};
