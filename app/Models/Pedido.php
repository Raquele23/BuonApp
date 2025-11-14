<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['mesa_id', 'total', 'status'];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function pratos()
    {
        return $this->belongsToMany(Prato::class)->withPivot('quantidade')->withTimestamps();
    }
}