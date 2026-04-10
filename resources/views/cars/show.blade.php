<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🚗 {{ $car->marca }} {{ $car->modelo }} ({{ $car->anio }})
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white shadow rounded-lg p-6">

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="font-medium text-gray-600">Marca:</span>
                        <p class="text-gray-800">{{ $car->marca }}</p>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Modelo:</span>
                        <p class="text-gray-800">{{ $car->modelo }}</p>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Año:</span>
                        <p class="text-gray-800">{{ $car->anio }}</p>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Color:</span>
                        <p class="text-gray-800">{{ $car->color }}</p>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Precio:</span>
                        <p class="text-green-700 font-bold text-lg">${{ number_format($car->precio, 2) }}</p>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Kilometraje:</span>
                        <p class="text-gray-800">{{ number_format($car->kilometraje) }} km</p>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <a href="{{ route('cars.edit', $car) }}"
                       class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
                        Editar
                    </a>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST"
                          onsubmit="return confirm('¿Eliminar este carro?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                            Eliminar
                        </button>
                    </form>
                    <a href="{{ route('cars.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                        Volver al listado
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>