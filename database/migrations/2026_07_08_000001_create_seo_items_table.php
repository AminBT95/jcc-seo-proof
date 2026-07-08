<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoItemsTable extends Migration
{
    public function up()
    {
        Schema::create('seo_items', function (Blueprint $table) {
            $table->id();
            $table->string('type')->index();
            $table->string('title');
            $table->string('slug')->index();
            $table->string('path')->unique();
            $table->longText('content')->nullable();
            $table->string('seo_title');
            $table->text('seo_description');
            $table->string('focus_keyword')->nullable();
            $table->string('robots')->default('index, follow');
            $table->string('status')->default('published');
            $table->string('og_image')->nullable();
            $table->unsignedTinyInteger('seo_score')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seo_items');
    }
}
