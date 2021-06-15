<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giocatori extends Model
{
    protected $table = 'giocatori';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'ruolo',
        'url'
    ];
    
    public function squadra() {
        return $this->belongsToMany("App\Models\Squadra", 'giocatori_appartenenti',
         'Id', 'squadra');
    }
    
}