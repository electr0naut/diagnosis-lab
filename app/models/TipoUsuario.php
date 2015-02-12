<?php

class TipoUsuario extends Eloquent
{
    protected $table = 'veterinaria.tipo_usuario';
    
    public function usuarios()
    {
        return $query->hasMany('Usuario', 'id', 'id');
    }
}