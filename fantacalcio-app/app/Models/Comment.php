<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'commenti';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'commento'
    ];

    public function users() {
        return $this->belongsTo("App\Models\User");
    }
    public function news() {
        return $this->belongsTo("App\Models\News");
    }
}
