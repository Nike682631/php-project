<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSidebarColumnsToPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            //
			// $table->string('sidebar_image')->nullable();
			// $table->string('sidebar_link')->nullable();
            $table->boolean('sidebar')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page', function (Blueprint $table) {
            //
        });
    }
}
