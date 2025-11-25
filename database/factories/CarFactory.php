<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brands = ['Toyota', 'Honda', 'Ford', 'BMW', 'Mercedes', 'Audi', 'Volkswagen'];
        $models = ['Sedan', 'SUV', 'Hatchback', 'Coupe', 'Wagon'];
        
        $brand = $this->faker->randomElement($brands);
        
        $brandImages = [
            'Toyota' => 'https://images.unsplash.com/photo-1629897048514-3dd7414fe72a?w=400',
            'Honda' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=400',
            'Ford' => 'https://images.unsplash.com/photo-1612825173281-9a193378527e?w=400',
            'BMW' => 'https://images.unsplash.com/photo-1555215695-3004980ad54e?w=400',
            'Mercedes' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=400',
            'Audi' => 'https://images.unsplash.com/photo-1610768764270-790fbec18178?w=400',
            'Volkswagen' => 'https://images.unsplash.com/photo-1622353219448-46a009f0d44f?w=400'
        ];
        
        return [
            'brand' => $brand,
            'model' => $this->faker->randomElement($models),
            'year' => $this->faker->numberBetween(2015, 2024),
            'license_plate' => strtoupper($this->faker->bothify('???-###')),
            'image' => $brandImages[$brand],
            'daily_price' => $this->faker->randomFloat(2, 5000, 25000),
            'available' => $this->faker->boolean(80),
        ];
    }
}
