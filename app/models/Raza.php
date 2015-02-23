<?php

class Raza extends Eloquent
{
    protected $table = 'veterinaria.razas';

    protected $guarded = array('id');
    protected $fillable = array('NOMBRE', 'ESPECIE');


    public static $rules = array(
        'NOMBRE' => 'required',
        'ESPECIE' => 'required',
    );
    
    public function especies()
    {
        return $this->belongsTo('Especie', 'ESPECIE', 'id');
    }
}