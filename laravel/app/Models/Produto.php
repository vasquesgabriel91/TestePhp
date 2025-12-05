<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    protected $table = 'produto';

    protected $fillable = [
        'nomeProduto',
        'codBarras',
        'valorUnitario',
    ];

    protected $casts = [
        'dtPedido' => 'datetime',
        'valorUnitario' => 'float',
        'qtd' => 'integer',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
