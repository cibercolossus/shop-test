<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ProductoComponent extends Component
{
    use WithPagination;
    public $product_id, $nombre, $precio, $impuesto, $slug;
    public $view = 'create-product';

    public function render()
    {
        return view('livewire.producto-component', [
            'products' => Producto::paginate(5)
        ]);
    }

    public function save()
    {
        $this->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'impuesto' => 'required',
        ]);

        Producto::create([
            'nombre' =>  $this->nombre,
            'precio' =>  $this->precio,
            'impuesto' =>  $this->impuesto,
            'slug' => Str::slug($this->nombre)
        ]);
        $this->reset();
    }

    public function edit($id)
    {
        $product = Producto::find($id);
        $this->product_id = $product->id;
        $this->nombre = $product->nombre;
        $this->precio = $product->precio;
        $this->impuesto = $product->impuesto;
        $this->view = 'edit-product';
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'impuesto' => 'required',
        ]);

        $product = Producto::find($this->product_id);
        $product->update([
            'nombre' =>  $this->nombre,
            'precio' =>  $this->precio,
            'impuesto' =>  $this->impuesto,
            'slug' => Str::slug($this->nombre)
        ]);
        $this->reset();
    }


    public function destroy($id)
    {
        Producto::destroy($id);
    }
}
