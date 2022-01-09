<div class="container mx-auto">
    <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
        <div>
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700">Nuevo Producto</h1>
            </div>

            @include('livewire.form')
            
            <button type="button" wire:click='save'
                class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">
                Guardar
            </button>
        </div>
    </div>
</div>
