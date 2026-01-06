<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title',
        'content',
        'updated_by',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'array',
        ];
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
