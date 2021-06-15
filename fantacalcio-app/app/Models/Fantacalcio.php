<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Fantacalcio extends Model
{
    protected $table = 'fantacalcio';
    protected $primaryKey = 'cod';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'regolamento',
        'modalità',
        'num_max_partecipanti',
        'img'
    ];

    public function edizione_fantacalcio() {
        return $this->hasMany("App\Models\Edizione_fantacalcio",'Fantacalcio','Cod');
    }
}
