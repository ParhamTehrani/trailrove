<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->index();
            $table->string('title');
            $table->string('canonical')->nullable();
            $table->string('thumbnail')->nullable();
            $table->unsignedInteger('seen')->nullable()->default(0);
            $table->string('slug')->unique();
            $table->text('body')->nullable();
            $table->string('short_description',500)->nullable();
            $table->string('meta_keyword',500)->nullable();
            $table->string('meta_description',500)->nullable();
            $table->enum('status',['draft','publish'])->default('draft');
            $table->softDeletes();
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
        Schema::dropIfExists('news');
    }
}
