<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title')->unique();
            $table->longText('content');
            $table->string('slug');
            $table->string('image');
            $table->string('alt');
            $table->integer('user_id')->unsigned();
            $table->foreignId('post_category_id')->constrained('post_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('published_at');
            $table->string('meta')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
