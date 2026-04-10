<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Carro — {{ $car->marca }} {{ $car->modelo }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white shadow rounded-lg p-6">

                {{-- Errores --}}
                @if($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('cars.update', $car) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Marca *</label>
                            <input type="text" name="marca" value="{{ old('marca', $car->marca) }}"
                                   class="w-full border rounded-lg px-3 py-2 @error('marca') border-red-500 @enderror"
                                   placeholder="ej. Toyota">
                            @error('marca') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Modelo *</label>
                            <input type="text" name="modelo" value="{{ old('modelo', $car->modelo) }}"
                                   class="w-full border rounded-lg px-3 py-2 @error('modelo') border-red-500 @enderror"
                                   placeholder="ej. Corolla">
                            @error('modelo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Año *</label>
                            <input type="number" name="anio" value="{{ old('anio', $car->anio) }}"
                                   class="w-full border rounded-lg px-3 py-2 @error('anio') border-red-500 @enderror"
                                   min="1900" max="{{ date('Y') + 1 }}">
                            @error('anio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Color *</label>
                            <input type="text" name="color" value="{{ old('color', $car->color) }}"
                                   class="w-full border rounded-lg px-3 py-2 @error('color') border-red-500 @enderror"
                                   placeholder="ej. Blanco">
                            @error('color') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Precio (USD) *</label>
                            <input type="number" name="precio" value="{{ old('precio', $car->precio) }}"
                                   class="w-full border rounded-lg px-3 py-2 @error('precio') border-red-500 @enderror"
                                   step="0.01" min="0">
                            @error('precio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kilometraje *</label>
                            <input type="number" name="kilometraje" value="{{ old('kilometraje', $car->kilometraje) }}"
                                   class="w-full border rounded-lg px-3 py-2 @error('kilometraje') border-red-500 @enderror"
                                   min="0">
                            @error('kilometraje') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                    </div>

                    <div class="mt-6 flex gap-3">
                        <button type="submit"
                                class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600">
                            Actualizar Carro
                        </button>
                        <a href="{{ route('cars.index') }}"
                           class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>