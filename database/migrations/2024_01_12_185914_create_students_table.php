<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('DNI', 15);
            $table->string('name', 50);
            $table->string('lastName', 50);
            $table->string('subject', 50);
            $table->float('grade1')->default(0);//->nullable();
            $table->float('grade2')->default(0);//->nullable();
            $table->float('grade3')->default(0);//->nullable();
            $table->float('finalGrade')->default(0);//->nullable();
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
        Schema::dropIfExists('students');
    }
}
