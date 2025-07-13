<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Animal extends Model
{
        /**
     * 可以被批量賦值的屬性。
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'name',
        'birthday',
        'area',
        'fix',
        'description',
        'personality',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function getAgeAttribute()
    {
        $diff = Carbon::now()->diff($this->birthday);
        return "{$diff->y}歲{$diff->m}月";
    }
}
