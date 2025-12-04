<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'client_id',
        'dtPedido',
        'codBarras',
        'nomeProduto',
        'valorUnitario',
        'qtd',
    ];

    protected $casts = [
        'dtPedido' => 'datetime',
        'valorUnitario' => 'float',
        'qtd' => 'integer',
    ];

    /**
     * Relacionamento: Um pedido pertence a um cliente
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}