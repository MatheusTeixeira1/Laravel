<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = $this->faker->unique()->word();
        return [
            'nome'=>$nome,
            'descricao'=>$this->faker->paragraph(),
            'preco'=>$this->faker->randomNumber(2),
            'slug'=>Str::slug($nome),
            'imagem' => 'https://picsum.photos/400/400?random='.rand(1,1000),
            'id_user'=>User::pluck('id')->random(),
            'id_categoria'=>Categoria::pluck('id')->random(),
        ];
    }
}
