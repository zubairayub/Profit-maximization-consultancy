<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KpiMetric extends Model
{
    protected $fillable = [
        'client_id',
        'metric_name',
        'value',
        'period',
        'period_date',
        'unit',
        'notes',
    ];

    protected $casts = [
        'value' => 'decimal:2',
        'period_date' => 'date',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
