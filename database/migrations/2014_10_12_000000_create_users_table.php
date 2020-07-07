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
            $table->bigIncrements('id');
            $table->integer('role_id')->default(2)->comment('0=Inactive | 1=Admin | 2=Customer');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username',100)->unique();
            $table->string('email', 100)->unique();
            $table->string('phone', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('street_address');
            $table->unsignedInteger('division')->comment('Division Table ID');
            $table->unsignedInteger('district')->comment('District Table ID');
            $table->unsignedTinyInteger('status')->default(0)->comment('0=Inactive | 1=Active | 2=Ban');
            $table->string('image')->default('default.png');
            $table->string('ip_address')->nullable();
            $table->text('shipping_address')->nullable();
            $table->text('about')->nullable();
            $table->rememberToken();
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
