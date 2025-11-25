<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rental;
use App\Models\Car;
use App\Models\Customer;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = Car::all();
        $customers = Customer::all();
        
        foreach ($customers->take(10) as $customer) {
            Rental::create([
                'car_id' => $cars->random()->id,
                'customer_id' => $customer->id,
                'start_date' => now()->subDays(rand(1, 30)),
                'end_date' => now()->addDays(rand(1, 14)),
                'total_price' => rand(15000, 75000),
                'status' => ['active', 'completed', 'cancelled'][rand(0, 2)]
            ]);
        }
    }
}
