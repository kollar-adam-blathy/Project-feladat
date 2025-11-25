<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'license_plate' => 'required|unique:cars',
            'daily_price' => 'required|numeric',
            'available' => 'required|boolean'
        ]);

        Car::create($request->all());
        return redirect('/cars');
    }

    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'license_plate' => 'required',
            'daily_price' => 'required|numeric',
            'available' => 'required|boolean'
        ]);

        $car = Car::findOrFail($id);
        $car->update($request->all());
        return redirect('/cars');
    }

    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect('/cars');
    }
}
