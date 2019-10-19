<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaLivroEmprestimo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro_emprestimo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id','fk_livroemprestimo_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('livro_id');
            $table->foreign('livro_id','fk_livroemprestimo_livro')->references('id')->on('livro')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_emprestimo');
            $table->string('emprestimo_a',100);
            $table->boolean('estado');
            $table->date('fecha_devolucao')->nullable();
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
        Schema::dropIfExists('livro_emprestimo');
    }
}
