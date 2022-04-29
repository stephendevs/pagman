<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('platform');
            $table->text('description')->nullable();
            $table->MediumText('link');
            $table->nullableMorphs('sociable');
            $table->timestamps();
        });

        Schema::create('sociable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('social_link_id');
            $table->bigInteger('sociable_id');
            $table->string('sociable_type');
            $table->foreign('social_link_id')->references('id')->on('social_links')->onDelete('cascade');
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
        Schema::dropIfExists('social_links');
    }
}
