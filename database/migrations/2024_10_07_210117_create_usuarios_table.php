<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Cria uma coluna ID como chave primária
            $table->string('usuario')->unique(); // Cria a coluna 'usuario' que deve ser única
            $table->string('senha'); // Cria a coluna 'senha'
            $table->timestamps(); // Cria colunas 'created_at' e 'updated_at'
        });
    }


    public function down()
    {
        Schema::dropIfExists('usuarios'); // Remove a tabela 'usuarios' se existir
    }
}


public function up()
{
    Schema::create('teachers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamps();
    });
}

?>
