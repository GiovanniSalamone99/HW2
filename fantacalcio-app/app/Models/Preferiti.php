<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preferiti extends Model
{
    protected $table = 'preferiti';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titolo',
        'img',
        'url',
        'fantallenatore'
    ];

    public function users() {
        return $this->belongsTo("App\Models\User");
    }
}