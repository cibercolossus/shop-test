<?php

namespace App\Http\Livewire;

use App\Models\Compra;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class CompraComponent extends Component
{
    public function render()
    {
        return view('livewire.compra-component', [
            'products' => Producto::paginate(5)
        ]);
    }

    public function buy($producto_id, $qty)
    {
        if (isset($producto_id)) {
            Compra::create([
                'producto_id' =>  $producto_id,
                'user_id' => Auth::id(),
                'cantidad' =>  $qty,
            ]);
            session()->flash('message', 'Compra Realizada con Exito!.');
        }
    }
}
