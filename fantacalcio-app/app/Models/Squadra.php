<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Squadra extends Model
{
    protected $table = 'squadra';
    protected $primaryKey = 'Cod_S';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome_squadra',
        'edizione_fantacalcio'
    ];

    public function users() {
        return $this->belongsTo("App\Models\User");
    }
    public function edizione_fantacalcio() {
        return $this->belongsTo("App\Models\Edizione_fantacalcio");
    }
    
    public function giocatori() {
        return $this->belongsToMany("App\Models\Giocatori", 'giocatori_appartenenti',
         'squadra', 'Id');
    }
    
}
