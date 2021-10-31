<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConversationsTableForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table('conversations', function (Blueprint $table) {
			//
			$table->bigInteger('user_one')->unsigned()->change();
			$table->index('user_one');
			$table->foreign('user_one')->references('id')->on('users')->onDelete('cascade');

			$table->bigInteger('user_two')->unsigned()->change();
			$table->index('user_two');
			$table->foreign('user_two')->references('id')->on('users')->onDelete('cascade');

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
