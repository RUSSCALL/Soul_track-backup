<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            // Admin only fillable content
            $table->id();
            $table->string('user_role_name');
            $table->string('program_name');
            $table->boolean('active_bool')->default(true);
            $table->integer('indivTargetAttendance');
            $table->integer('totalTargetAttendance');
            // all user fillable content
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('contact')->nullable();
            $table->string('location')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('programs');
    }
}
