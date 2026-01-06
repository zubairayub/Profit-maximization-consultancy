<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'interest',
        'company_size',
        'name',
        'title',
        'company',
        'email',
        'phone',
        'challenge',
        'status',
    ];
}
