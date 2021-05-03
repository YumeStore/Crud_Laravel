<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos_cursos', function (Blueprint $table) {
            $table->integer('idAluno')->references('id')->on('alunos');
            $table->integer('idCurso')->references('id')->on('cursos');
            $table->string('turno');
            $table->integer('idBolsa')->references('id')->on('bolsas');;
            $table->dateTime('dataInicio');
            $table->dateTime('dataTermino');
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
        Schema::dropIfExists('alunos_cursos');
    }
}
