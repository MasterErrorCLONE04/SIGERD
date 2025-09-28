<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'reported_by',
        'image',
    ];

    public function reportedBy()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
}
