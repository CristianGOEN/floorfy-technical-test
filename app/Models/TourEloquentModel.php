<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'tours';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $casts = [
        'enabled' => 'boolean'
    ];

    protected $fillable = [
        'property_id',
        'enabled'
    ];
}
