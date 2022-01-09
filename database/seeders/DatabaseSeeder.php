<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        $producto = new Producto();
        $producto->nombre = 'Producto 1';
        $producto->slug = 'producto-1';
        $producto->precio = 123.45;
        $producto->impuesto = 5.00;
        $producto->save();

        $producto = new Producto();
        $producto->nombre = 'Producto 2';
        $producto->slug = 'producto-2';
        $producto->precio = 45.65;
        $producto->impuesto = 15.00;
        $producto->save();
        
        $producto = new Producto();
        $producto->nombre = 'Producto 3';
        $producto->slug = 'producto-3';
        $producto->precio = 39.73;
        $producto->impuesto = 12.00;
        $producto->save();

        $producto = new Producto();
        $producto->nombre = 'Producto 4';
        $producto->slug = 'producto-4';
        $producto->precio = 250.00;
        $producto->impuesto = 8.00;
        $producto->save();

        $producto = new Producto();
        $producto->nombre = 'Producto 5';
        $producto->slug = 'producto-5';
        $producto->precio = 59.35;
        $producto->impuesto = 10.00;
        $producto->save();

        \App\Models\Compra::factory(5)->create();
    }
}
