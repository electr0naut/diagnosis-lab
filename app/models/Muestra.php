<?php

class Muestra extends Eloquent
{
    protected $table = 'veterinaria.muestras';
    
    public function informe()
    {
        return $query->belongsTo('Informe','INFORME','id');
    }
    
    #TODO: Comprobar conexion entre Muestra y Diagnóstico
}