<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_logs', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('blog_id')->unsigned();
            $table->foreign('blog_id')->references('id')->on('blogs');
			$table->text('blog_details');
			$table->integer('updated_by')->unsigned();
			$table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('blog_logs');
    }
}
