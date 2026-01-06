<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'legal_name',
        'slug',
        'industry',
        'revenue_band',
        'package_tier',
        'status',
        'primary_user_id',
        'notes',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot(['relationship']);
    }

    public function primaryUser()
    {
        return $this->belongsTo(User::class, 'primary_user_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function messages()
    {
        return $this->hasMany(ClientMessage::class);
    }

    public function kpiMetrics()
    {
        return $this->hasMany(KpiMetric::class);
    }
}
