<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentraBibit extends Model
{
    use HasFactory;

    protected $table = 'sentra_bibits';

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'sentra_bibit', 'id');
    }
}
