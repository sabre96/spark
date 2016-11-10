<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up () {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');

            //Link user_id from users table
            $table->integer('user_id')->unsigned()->index();

            //Company
            $table->string('name', 100)->unique();
            $table->string('email')->unique();
            $table->string('phone', 15);
            $table->string('street', 100);
            $table->string('streetNum', 11);
            $table->string('zip', 10);
            $table->string('city', 100);
            $table->string('country', 100);
            $table->integer('kvk')->unique();
            $table->string('btw', 15)->unique();

            //dates
            $table->date('ending_on');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::drop('customers');
    }
}
