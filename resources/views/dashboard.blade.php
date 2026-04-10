<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de Administración
        </h2>

        <nav class="text-sm text-gray-500 flex items-center gap-2">
            <span>Dashboard</span>
            <span>/</span>
            <a href="{{ route('cars.index') }}" 
               class="text-blue-600 hover:underline">
                Lista de Carros
            </a>
        </nav>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Tarjetas de estadísticas --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-blue-600 text-white rounded-lg p-4 text-center">
                    <div class="text-3xl font-bold">{{ $stats['total'] }}</div>
                    <div class="text-sm opacity-80">Total Carros</div>
                </div>
                <div class="bg-green-600 text-white rounded-lg p-4 text-center">
                    <div class="text-3xl font-bold">
                        ${{ number_format($stats['precio_promedio'], 0) }}
                    </div>
                    <div class="text-sm opacity-80">Precio Promedio</div>
                </div>
                <div class="bg-purple-600 text-white rounded-lg p-4 text-center">
                    <div class="text-3xl font-bold">
                        ${{ number_format($stats['precio_max'], 0) }}
                    </div>
                    <div class="text-sm opacity-80">Precio Máximo</div>
                </div>
                <div class="bg-orange-500 text-white rounded-lg p-4 text-center">
                    <div class="text-3xl font-bold">
                        ${{ number_format($stats['precio_min'], 0) }}
                    </div>
                    <div class="text-sm opacity-80">Precio Mínimo</div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Por marca --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-gray-700 mb-4">🚗 Carros por Marca</h3>
                    @foreach($por_marca as $item)
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700">{{ $item->marca }}</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full font-semibold">
                                {{ $item->total }}
                            </span>
                        </div>
                        {{-- Barra de progreso --}}
                        <div class="w-full bg-gray-200 rounded-full h-1.5 mb-3">
                            <div class="bg-blue-600 h-1.5 rounded-full"
                                 style="width: {{ ($item->total / $stats['total']) * 100 }}%">
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Por año --}}
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-gray-700 mb-4">📅 Carros por Año</h3>
                    @foreach($por_anio as $item)
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700">{{ $item->anio }}</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-semibold">
                                {{ $item->total }}
                            </span>
                        </div>
                        {{-- Barra de progreso --}}
                        <div class="w-full bg-gray-200 rounded-full h-1.5 mb-3">
                            <div class="bg-green-600 h-1.5 rounded-full"
                                 style="width: {{ ($item->total / $stats['total']) * 100 }}%">
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
