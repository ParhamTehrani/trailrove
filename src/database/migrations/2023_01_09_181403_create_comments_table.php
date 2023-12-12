<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
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
            $table->foreignId('admin_id')->nullable()->index();
            $table->foreignId('comment_id')->nullable()->index();
            $table->unsignedInteger('commentable_id');
            $table->string('commentable_type');
            $table->text('message');
            $table->string('full_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('url')->nullable();
            $table->string('email')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
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
        Schema::dropIfExists('comments');
    }
}
