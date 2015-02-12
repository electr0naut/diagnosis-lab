<?php

class Entidad extends Eloquent
{
    protected $table = 'veterinaria.entidades';
    
    public function formaPago()
    {
        return $query->belongsTo('FormaPago', 'FORMAPAGO', 'id');
    }
}