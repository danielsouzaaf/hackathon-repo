<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyToOrdemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordems', function (Blueprint $table) {
            $table->integer('statuses_id')->unsigned();

            $table->foreign('statuses_id')->references('id')->on('statuses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordems', function (Blueprint $table) {
            $table->dropForeign(['statuses_id']);

        });
    }
}
