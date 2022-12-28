<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'value',
    ];

    public function rule()
    {
        return $this->hasMany(Rule::class, 'value_id', 'id');
    }
}
