<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_title')->unique();
            $table->string('post_key')->unique();
            $table->string('post_type');
            $table->enum('sp', ['1', '0'])->default('0'); //special post or page (1) -- defined in theme config
            $table->text('extract_text')->nullable();
            $table->longText('post_content')->nullable();
            $table->string('mime_type')->nullable();
            $table->text('post_featured_image')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('updatedby_id')->nullable();
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('updatedby_id')->references('id')->on('users');
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
        Schema::dropIfExists('post');
    }
}
