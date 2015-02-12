<?php

class Diagnostico extends Eloquent
{
    protected $table = 'veterinaria.diagnosticos';
    
    public function muestra()
    {
        return $query->hasOne('Muestra', 'MUESTRA', 'id');
    }
}