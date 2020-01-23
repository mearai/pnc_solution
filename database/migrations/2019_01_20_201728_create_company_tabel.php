<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
              $table->Increments('id');
            $table->string('name' , 100);
            $table->string('email' , 100);
            $table->string('logo' , 500);
            $table->string('website' , 500);
            $table->timestamps();
        });

        Schema::create('employes', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('first_name' , 100);
            $table->string('last_name' , 100);
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
            $table->string('email' , 100);
            $table->bigInteger('phone');
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
        Schema::dropIfExists('company');
         Schema::dropIfExists('employes');
    }
}
