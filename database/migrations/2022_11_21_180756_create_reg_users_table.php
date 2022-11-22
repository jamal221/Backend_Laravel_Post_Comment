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
        Schema::create('reg_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('surname')->nullable(false);
            $table->string('nickname')->nullable();
            $table->string('phone')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address', 100)->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('state');
            $table->string('zipcode');
            $table->rememberToken();
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
        Schema::dropIfExists('reg_users');
    }
};
