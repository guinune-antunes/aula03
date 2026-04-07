<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('user_log', 50)->nullable();
            $table->string('pw_log',255)->nullable();
            $table->string('name',255)->nullable();
            $table->string('cpf',11)->nullable();
            $table->string('Rua',255)->nullable();
            $table->string('numero',10)->nullable();
            $table->string('bairro',255)->nullable();
            $table->string('cidade',255)->nullable();
            $table->string('estado',2)->nullable();
            $table->string('cep',8)->nullable();
            $table->string('complemento',255)->nullable();
            $table->datetime('ultimo_log')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
