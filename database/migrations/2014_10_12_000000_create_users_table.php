<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->string('email',80)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('user_id')->default(3);
            $table->text('photo')->nullable();
            $table->text('password')->nullable();
            $table->text('token_login')->nullable();
            $table->unsignedBigInteger('login_2fa_statu')->default(1);
            $table->rememberToken();
            $table->tinyInteger('blocked_temporarily')->default(0);
            $table->tinyInteger('blocked_permanently')->default(0);
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
        Schema::dropIfExists('users');
    }
}
