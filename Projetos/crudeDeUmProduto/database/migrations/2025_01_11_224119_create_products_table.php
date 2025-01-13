<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
    	Schema::create('products', function (Blueprint $table) {
        	$table->id();
        	$table->string('nome');
        	$table->decimal('preco', 8, 2); // Preço com até 8 dígitos e 2 decimais.
        	$table->timestamps(); // Campos "created_at" e "updated_at".
    	   });
	}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
