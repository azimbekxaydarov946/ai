<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'result',
        'description',
    ];

    public function rule()
    {
        return $this->hasMany(Rule::class, 'result_id', 'id');
    }
}
