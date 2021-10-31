<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('activity_id')->unsigned()->index();
            /* This is dependent on spatie/activitylog package */
            $table->foreign('activity_id')->references('id')->on('activity_log')->onDelete('cascade');

            $table->text('comment_text');
            $table->foreignId('parent_id')->nullable()->references('id')->on('comments');
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
        Schema::dropIfExists('comments');
    }
}
