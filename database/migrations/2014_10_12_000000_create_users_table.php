<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nick_name');
            $table->string('true_name')->default('未填');
            $table->string('avatar')->comment('头像');
            $table->string('phone', 11)->default('未填');
            $table->string('position', 20)->default('无')->comment('职务');
            $table->string('openid', 128);
            $table->string('session_key', 128);
            $table->tinyInteger('status')->default(1)->comment('状态：0禁用、1正常');
            $table->tinyInteger('gender')->default(0)->comment('性别：0未知、1男、2女');
            $table->tinyInteger('identify')->default(1)->comment('身份：1客户、2员工、3司乘人员');
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
