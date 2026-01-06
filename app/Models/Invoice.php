<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'issued_by',
        'number',
        'type',
        'currency',
        'amount',
        'status',
        'issued_at',
        'due_at',
        'paid_at',
        'advance_required_percent',
        'advance_paid_amount',
        'success_fee_percent',
        'incremental_profit_amount',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'advance_paid_amount' => 'decimal:2',
            'success_fee_percent' => 'decimal:2',
            'incremental_profit_amount' => 'decimal:2',
            'issued_at' => 'date',
            'due_at' => 'date',
            'paid_at' => 'date',
        ];
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function issuer()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }
}
