<?php

class Muestra extends Eloquent
{
    protected $table = 'veterinaria.muestras';
    
    public function informe()
    {
        return $this->belongsTo('Informe','INFORME','id');
    }
    
    #TODO: Comprobar conexion entre Muestra y Diagnóstico
}