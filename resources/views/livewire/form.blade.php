    <div class="mb-6">
        <label for="nombre" class="block mb-2 text-sm text-gray-600">Nombre</label>
        <input type="text" name="nombre" placeholder="Producto X" required wire:model='nombre'
            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
        @error('nombre') <span>{{ $message }}</span> @enderror
    </div>
    <div class="mb-6">
        <label for="precio" class="text-sm text-gray-600">Precio</label>
        <input type="number" name="precio" placeholder="99.99" required wire:model='precio'
            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
        @error('precio') <span>{{ $message }}</span> @enderror
    </div>
    <div class="mb-6">
        <label for="impuesto" class="text-sm text-gray-600">Impuesto</label>
        <input type="number" name="impuesto" placeholder="99.99" required wire:model='impuesto'
            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
        @error('impuesto') <span>{{ $message }}</span> @enderror
    </div>
