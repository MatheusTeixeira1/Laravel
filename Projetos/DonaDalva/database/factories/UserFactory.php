<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            
            // Campos adicionais
            'telefone' => $this->faker->phoneNumber(),
            'rg' => $this->faker->numerify('########'),
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'cidade' => $this->faker->city(),
            'bairro' => $this->faker->word(),
            'rua' => $this->faker->streetName(),
            'cep' => $this->faker->numerify('######-##'),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => $this->faker->optional()->sentence(),
            'imagem' => 'https://picsum.photos/400/400?random='.rand(1,1000),
            'numeroPix' => $this->faker->optional()->email(),
            'nivelUsuario' => $this->faker->randomElement(['adm', 'cliente', 'motoboy', 'cozinheira']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Estados personalizados para cada nível de usuário
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'nivelUsuario' => 'adm',
            ];
        });
    }

    public function cliente()
    {
        return $this->state(function (array $attributes) {
            return [
                'nivelUsuario' => 'cliente',
            ];
        });
    }

    public function motoboy()
    {
        return $this->state(function (array $attributes) {
            return [
                'nivelUsuario' => 'motoboy',
            ];
        });
    }

    public function cozinheira()
    {
        return $this->state(function (array $attributes) {
            return [
                'nivelUsuario' => 'cozinheira',
            ];
        });
    }
}