<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titolo',
        'descrizione',
        'img'
    ];

    public function comments() {
        return $this->hasMany("App\Models\Comment",'cod_news','Id');
    }
    
    
}
