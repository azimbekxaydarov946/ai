<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'attribute_id',
        'value_id',
        'result_id',
        'rule',
        'step',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function attribut()
    {
        return $this->belongsTo(Attribut::class, 'attribute_id', 'id');
    }
    public function value()
    {
        return $this->belongsTo(Value::class, 'value_id', 'id');
    }
    public function result()
    {
        return $this->belongsTo(Result::class, 'result_id', 'id');
    }
}
