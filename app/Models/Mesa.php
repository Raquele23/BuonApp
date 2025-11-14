<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $fillable = ['numero','capacidade','status'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
