<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Car::query();
        if($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('marca', 'like', "%$search%")
                  ->orWhere('modelo', 'like', "%$search%")
                  ->orWhere('color', 'ilike', "%{$search}%");
            });
        }

        if ($request->filled('marca')) {
        $query->where('marca', $request->marca);
        }

        if ($request->filled('anio')) {
            $query->where('anio', $request->anio);
        }

        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }

        $cars = $query->latest()->paginate(10)->withQueryString();
        $marcas = Car::distinct()->pluck('marca');
        $anios  = Car::distinct()->orderBy('anio', 'desc')->pluck('anio');
        return view('cars.index', compact('cars', 'marcas', 'anios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        Car::create($data);
        return redirect()->route('cars.index')->with('success', 'Carro creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
         return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $data = $request->validated();
        $car->update($data);
        return redirect()->route('cars.index')->with('success', 'Carro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
         $car->delete();

        return redirect()->route('cars.index')
        ->with('success', '¡Carro eliminado exitosamente!');
    }
}
