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
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->text('menu_cache')->nullable();
            $table->timestamps();
        });

        Schema::create('menu_items', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('url')->nullable();
                $table->unsignedBigInteger('menu_id');
                $table->integer('item_order')->default(0);
                $table->enum('is_child', ['0', '1'])->default('0');
                $table->unsignedBigInteger('parent_id')->nullable();
                $table->nullableMorphs('menu_item');

                $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
                $table->foreign('parent_id')->references('id')->on('menu_items')->onDelete('cascade');
                $table->timestamps();
        });

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

        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->nullable();
            $table->string('description')->nullable();
            $table->string('url');
            $table->string('media_type')->nullable();
            $table->timestamps();
        });

        Schema::create('mediables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('media_id');
            $table->bigInteger('mediable_id');
            $table->string('mediable_type');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');

            $table->timestamps();
        });

        
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('categorables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->bigInteger('categorable_id');
            $table->string('categorable_type');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('downloads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('download');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('downloadables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('download_id');
            $table->bigInteger('downloadable_id');
            $table->string('downloadable_type');
            $table->foreign('download_id')->references('id')->on('downloads')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('icons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->nullable();
            $table->string('description')->nullable();
            $table->mediumText('icon');
            $table->string('icon_format')->nullable();
            $table->nullableMorphs('iconable');
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('contact');
            $table->string('contact_type')->nullable();
            $table->nullableMorphs('contactable');
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
        Schema::dropIfExists('pages');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_media');
    }
    
}
