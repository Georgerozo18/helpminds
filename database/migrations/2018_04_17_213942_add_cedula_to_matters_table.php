<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCedulaToMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matters', function (Blueprint $table) {
            $table->foreign('id_student')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matters', function (Blueprint $table) {
            $table->dropForeign('matters_id_student_foreign');
            // $table->dropColumn('cedula_estudiante');
        });
    }
}
