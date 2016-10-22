<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaColumnsOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nome_empresa');
            $table->string('cnpj')->unique();
            $table->string('endereco')->nullable();
            $table->string('ramo')->nullable();
            $table->string('telefone')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn(['nome_empresa', 'cnpj', 'endereco', 'ramo', 'telefone']);
        });
    }
}
