<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;
use App\Models\Car;
use App\Models\Customer;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::with(['car', 'customer'])->get();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $cars = Car::all();
        $customers = Customer::all();
        return view('rentals.create', compact('cars', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date'
        ]);

        $car = Car::findOrFail($request->car_id);
        
        $startDate = new \DateTime($request->start_date);
        $endDate = new \DateTime($request->end_date);
        $days = $startDate->diff($endDate)->days;
        $totalPrice = $days * $car->daily_price;

        Rental::create([
            'car_id' => $request->car_id,
            'user_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $totalPrice,
            'status' => 'active'
        ]);

        return redirect('/my-rentals')->with('success', 'Autó sikeresen lefoglalva!');
    }

    public function show(string $id)
    {
        $rental = Rental::with(['car', 'customer'])->findOrFail($id);
        return view('rentals.show', compact('rental'));
    }

    public function edit(string $id)
    {
        $rental = Rental::findOrFail($id);
        $cars = Car::all();
        $customers = Customer::all();
        return view('rentals.edit', compact('rental', 'cars', 'customers'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:customers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'total_price' => 'required|numeric',
            'status' => 'required'
        ]);

        $rental = Rental::findOrFail($id);
        $rental->update($request->all());
        return redirect('/rentals');
    }

    public function destroy(string $id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();
        return redirect('/rentals');
    }
}
