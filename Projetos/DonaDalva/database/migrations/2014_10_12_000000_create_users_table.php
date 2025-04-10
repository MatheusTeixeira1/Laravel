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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // Campos adicionais (todos opcionais)
            $table->string('telefone', 20)->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('cpf', 14)->unique()->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('rua', 100)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('imagem')->nullable();
            $table->string('numeroPix', 100)->nullable();
            $table->enum('nivelUsuario', ['adm', 'cliente', 'motoboy', 'cozinheira'])->nullable(); // também pode ser opcional

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
