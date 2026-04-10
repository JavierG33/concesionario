<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 Catálogo de Carros
            </h2>
            <a href="{{ route('cars.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + Agregar Carro
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="GET" action="{{ route('cars.index') }}"
                class="bg-white p-4 rounded-lg shadow mb-6 flex flex-wrap gap-3">

                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Buscar por marca, modelo o color..."
                    class="flex-1 border rounded-lg px-3 py-2 min-w-[200px]">

                <select name="marca" class="border rounded-lg px-3 py-2">
                    <option value="">Todas las marcas</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca }}" {{ request('marca') == $marca ? 'selected' : '' }}>
                            {{ $marca }}
                        </option>
                    @endforeach
                </select>

                <select name="anio" class="border rounded-lg px-3 py-2">
                    <option value="">Todos los años</option>
                    @foreach($anios as $anio)
                        <option value="{{ $anio }}" {{ request('anio') == $anio ? 'selected' : '' }}>
                            {{ $anio }}
                        </option>
                    @endforeach
                </select>

                <input type="number" name="precio_max" value="{{ request('precio_max') }}"
                    placeholder="Precio máximo"
                    class="border rounded-lg px-3 py-2 w-40">

                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Filtrar
                </button>

                <a href="{{ route('cars.index') }}"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                    Limpiar
                </a>

            </form>

            {{-- Tabla --}}
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Marca</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Modelo</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Año</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Color</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Precio</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kilometraje</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($cars as $car)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">{{ $car->marca }}</td>
                            <td class="px-4 py-3">{{ $car->modelo }}</td>
                            <td class="px-4 py-3">{{ $car->anio }}</td>
                            <td class="px-4 py-3">{{ $car->color }}</td>
                            <td class="px-4 py-3 text-green-700 font-semibold">
                                ${{ number_format($car->precio, 2) }}
                            </td>
                            <td class="px-4 py-3">{{ number_format($car->kilometraje) }} km</td>
                            <td class="px-4 py-3 flex gap-2">
                                <a href="{{ route('cars.show', $car) }}"
                                   class="text-blue-600 hover:underline text-sm">Ver</a>
                                <a href="{{ route('cars.edit', $car) }}"
                                   class="text-yellow-600 hover:underline text-sm">Editar</a>
                                <form action="{{ route('cars.destroy', $car) }}" method="POST"
                                      onsubmit="return confirm('¿Eliminar este carro?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:underline text-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-8 text-gray-400">
                                No hay carros registrados aún.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            <div class="mt-4">
                {{ $cars->links() }}
            </div>

        </div>
    </div>
</x-app-layout>