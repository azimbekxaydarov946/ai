<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribut extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'attribute',
    ];

    public function rule()
    {
        return $this->hasMany(Rule::class, 'attribute_id', 'id');
    }
}
