<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_cars' => \App\Models\Car::count(),
            'active_rentals' => \App\Models\Rental::where('status', 'active')->count(),
            'total_users' => User::count(),
        ];
        
        $recentRentals = \App\Models\Rental::with(['car', 'user'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentRentals'));
    }

    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:20',
            'is_admin' => 'boolean',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'] ?? null,
            'is_admin' => $validated['is_admin'] ?? false,
        ]);

        return redirect()->back()->with('success', 'Felhasználó sikeresen létrehozva!');
    }

    public function toggleAdmin($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->email === 'admin@admin') {
            return redirect()->back()->with('error', 'A főadmin jogosultsága nem módosítható!');
        }

        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->back()->with('success', 'Felhasználó jogosultsága frissítve!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->email === 'admin@admin') {
            return redirect()->back()->with('error', 'A főadmin nem törölhető!');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Felhasználó törölve!');
    }
    
    public function cars()
    {
        $cars = \App\Models\Car::all();
        return view('admin.cars.index', compact('cars'));
    }
    
    public function createCarForm()
    {
        return view('admin.cars.create');
    }
    
    public function storeCar(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'license_plate' => 'required|string|max:255|unique:cars',
            'daily_price' => 'required|numeric',
            'available' => 'boolean',
            'category' => 'nullable|string|max:255',
            'transmission' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'seats' => 'nullable|integer',
            'color' => 'nullable|string|max:255',
            'mileage' => 'nullable|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        \App\Models\Car::create($validated);

        return redirect('/admin/cars')->with('success', 'Autó sikeresen hozzáadva!');
    }
    
    public function deleteCar($id)
    {
        $car = \App\Models\Car::findOrFail($id);
        $car->delete();

        return redirect()->back()->with('success', 'Autó törölve!');
    }
}
