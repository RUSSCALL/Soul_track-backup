<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollosalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collosal', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('winner_id');
            $table->string('fullName');
            $table->string('place_of_meeting');
            $table->string('location');
            $table->string('occupation');
            $table->integer('num1');
            $table->integer('num2')->nullable();
            $table->integer('num3')->nullable();
            $table->string('email')->nullable();
            $table->text('general_comments')->nullable();
            $table->boolean('not_born_again')->default(false);
            $table->boolean('already_born_again')->default(false);
            $table->boolean('got_born_again')->default(false);
            $table->boolean('already_in_church')->default(false);
            $table->boolean('no_church')->default(false);
            $table->boolean('HG_filled')->default(false);
            $table->timestamps();

            $table->foreign('winner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collosal');
    }
}
