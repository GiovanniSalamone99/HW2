<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Edizione_fantacalcio extends Model
{
    protected $table = 'edizione_fantacalcio';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo',
        'anno',
        'quota_iscrizione'
    ];

    public function squadra() {
        return $this->hasMany("App\Models\Squadra",'Edizione_Fantacalcio','Id');
    }
    public function fantacalcio() {
        return $this->belongsTo("App\Models\Fantacalcio");
    }
}
