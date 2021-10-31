<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();
            $table->unsignedSmallInteger('rating');
            $table->text('description')->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();

            $table->index('company_id');
            $table->foreign('company_id')->references('id')->on('users')->onDelete('cascade');

            $table->index('author_id');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
