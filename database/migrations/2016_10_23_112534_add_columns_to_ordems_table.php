<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToOrdemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordems', function (Blueprint $table) {
            $table->string('preco')->nullable();
            $table->date('data_limite')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordems', function ($table) {
            $table->dropColumn(['preco', 'data_limite']);
        });
    }
}
