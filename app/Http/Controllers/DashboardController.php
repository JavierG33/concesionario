<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total'           => Car::count(),
            'precio_promedio' => Car::avg('precio'),
            'precio_max'      => Car::max('precio'),
            'precio_min'      => Car::min('precio'),
            'km_promedio'     => Car::avg('kilometraje'),
        ];

        $por_marca = Car::selectRaw('marca, COUNT(*) as total')
            ->groupBy('marca')
            ->orderByDesc('total')
            ->get();

        $por_anio = Car::selectRaw('anio, COUNT(*) as total')
            ->groupBy('anio')
            ->orderByDesc('anio')
            ->get();

        return view('dashboard', compact('stats', 'por_marca', 'por_anio'));
    }
}
