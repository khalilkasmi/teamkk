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
            $table->string('name');
            $table->string('email')->unique();
            $table->date('birthdate');
            $table->text('phone');
            $table->string('city');
            $table->string('avatar');
            $table->text('address');
            $table->string('gender');
            $table->string('status');
            $table->text('bio');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->softDeletes();
            //linked accounts

            //$table->unsignedBigInteger('linked_account_id');
            //$table->foreign('linked_account_id')->references('id')->on('linked_accounts');

            //porfolio

            //$table->unsignedBigInteger('portfolio_id');
            //$table->foreign('portfolio_id')->references('id')->on('portfolios');

            //jobs

            //$table->unsignedBigInteger('jobs_id');
            //$table->foreign('jobs_id')->references('id')->on('jobs');


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
