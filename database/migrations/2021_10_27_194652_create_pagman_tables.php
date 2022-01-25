<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagmanTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('menu_cache')->nullable();
            $table->timestamps();
        });

        Schema::create('menu_items', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('url')->nullable();
                $table->unsignedInteger('menu_id');
                $table->integer('item_order')->default(0);
                $table->enum('is_child', ['0', '1'])->default('0');
                $table->unsignedInteger('parent_id')->nullable();
                $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
                $table->foreign('parent_id')->references('id')->on('menu_items')->onDelete('cascade');
                $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_title')->unique();
            $table->string('post_key')->unique();
            $table->string('post_type');
            $table->text('extract_text')->nullable();
            $table->text('post_content')->nullable();
            $table->string('mime_type')->nullable();
            $table->text('post_featured_image')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();


            $table->foreign('author_id')->references('id')->on(config('pagman.user_table', 'admins'))->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('post_media', function (Blueprint $table) {
            $table->increments('id');
            $table->text('media');
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedInteger('post_id')->nullable();
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on(config('pagman.user_table', 'admins'))->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_media');
    }
    
}
