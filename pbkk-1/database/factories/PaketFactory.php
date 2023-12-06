<?php

namespace Database\Factories;

use App\Models\PaketSoal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PaketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = PaketSoal::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_editor' => 1,
            'bahasas_id' => 1,
            'nama_paket' => fake()->word(),
            'deskripsi' => fake()->sentence(5)
        ];
    }
}
