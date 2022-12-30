<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'attribute_id',
        'value_id',
        'rule',
        'step',
        'user_id',
    ];

    public function attribut()
    {
        return $this->belongsTo(Attribut::class, 'attribute_id', 'id');
    }
    public function value()
    {
        return $this->belongsTo(Value::class, 'value_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
