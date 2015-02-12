<?php

class Especie extends Eloquent
{
    protected $table = 'veterinaria.especies';
    
    public function razas()
    {
        return $query->hasMany('Raza', 'ESPECIE', 'id');
    }
}