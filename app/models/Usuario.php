<?php

class Usuario extends Eloquent
{
    protected $table = 'veterinaria.usuarios';
    
    public function tipoUsuario()
    {
        return $query->belongsTo('TipoUsuario', 'TIPO', 'id');
    }
    
    public function ultimaEntidad()
    {
        return $query->belongsTo('Entidad', 'ULTIMAENTIDAD', 'id');
    }
}