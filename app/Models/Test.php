<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'result_id',
        'user_id',
        'rule',
        'step',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function result()
    {
        return $this->belongsTo(Result::class, 'result_id', 'id');
    }
}
