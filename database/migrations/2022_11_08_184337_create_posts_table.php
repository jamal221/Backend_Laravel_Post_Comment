<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID_Set_Post');
            $table->string('title',100);
            $table->text('body');
            $table->text('comment');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('UserID_Set_Post')
                ->references('id')
                ->on('login_users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // if in table exist foreign key, we have to delete it firstly
        Schema::table('posts', function (Blueprint $table){
            $table->dropForeign('UserID_Set_Post');
        });
        Schema::dropIfExists('posts');
    }
};
