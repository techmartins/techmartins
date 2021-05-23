<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razao_social',100);
            $table->string('cnpj',50);
            $table->string('email',100);
            $table->string('ramo_atividade',100);
            $table->string('cep',50);
            $table->string('endereco',100)->nullable();
            $table->string('bairro',50)->nullable();
            $table->string('uf',50)->nullable();
            $table->string('cidade',50)->nullable();
            $table->string('percentual',50);
            $table->string('contato',50);
            $table->string('referencia',50);
            $table->string('login',50);
            $table->string('password',50);
            $table->dateTime('created_at')->date_timestamp_set;
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
