<?php

class Raza extends Eloquent
{
    protected $table = 'veterinaria.razas';
    
    public function especies()
    {
        return $query->belongsTo('Especie', 'ESPECIE', 'id');
    }
}