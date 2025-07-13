<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name',
        'sort'
    ];
    /**
     * 取得類別的動物
     */
    public function animals()
    {
        return $this->hasMany(Animal::class, 'type_id', 'id');
    }
}
