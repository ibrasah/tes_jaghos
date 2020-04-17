<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('firstname',15);
            $table->char('lastname',15);
            $table->enum('gender',['Male','Female']);
            $table->enum('status',['Active','Pending','Banned','Loss']);
            $table->string('email');
            $table->string('city');
            $table->string('address');
            $table->char('phone',14);
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
        //
    }
}
