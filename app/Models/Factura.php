<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'impuestos',
        'total',
        'items',
    ];
    
    public function MarkProcessed($ids)
    {
        DB::table('compras')
            ->where('id', 'in', $ids)
            ->update(['status' => 'Procesada']);
    }
}
