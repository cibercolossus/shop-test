<?php

namespace App\Http\Livewire;

use App\Models\Compra;
use App\Models\Factura;
use Livewire\Component;
use Livewire\WithPagination;

class FacturaComponent extends Component
{
    use WithPagination;
    public $factura_id, $cliente, $impuestos, $total, $items = [];

    public function render()
    {
        return view('livewire.factura-component', [
            'compras' => Compra::where('status', '=', 'Pendiente')->count(),
            'facturas' => Factura::paginate(5),
        ]);
    }

    public function details($id)
    {
        $factura = Factura::find($id);
        $this->factura_id = $factura->id;
        $this->cliente = $factura->cliente;
        $this->impuestos = $factura->impuestos;
        $this->total = $factura->total;
        $this->items = json_decode($factura->items);

    }

    public function processPurchases()
    {
        $comprasToMark = [];
        $facturas = [];

        $compras =  Compra::where('status', '=', 'Pendiente')
            ->with('user')
            ->with('producto')
            ->orderByRaw('user_id')
            ->get();


        foreach ($compras as $compra) {
            array_push($comprasToMark, $compra->id);

            $i = array_search($compra->user->name, array_column($facturas, 'cliente'));

            if ($i !== false) {
                array_push($facturas[$i]['items'], [
                    'nombre' => $compra->producto->nombre,
                    'precio' => $compra->producto->precio,
                    'impuesto' => $compra->producto->impuesto
                ]);

                $facturas[$i]['total'] += $compra->producto->precio;
                $facturas[$i]['impuestos'] += $compra->producto->impuesto * $compra->producto->precio;
            } else {
                array_push($facturas, [
                    'cliente' => $compra->user->name,
                    'impuestos' => $compra->producto->impuesto * $compra->producto->precio,
                    'total' => $compra->producto->precio,
                    'items' => [
                        [
                            'nombre' => $compra->producto->nombre,
                            'precio' => $compra->producto->precio,
                            'impuesto' => $compra->producto->impuesto
                        ]
                    ]
                ]);
            }
        }

        foreach ($facturas as &$factura) {
            $factura['items'] = json_encode($factura['items']);
        }

        Factura::insert($facturas);

        Compra::whereIn('id', $comprasToMark)
            ->update(['status' => 'Procesada']);
    }
}
