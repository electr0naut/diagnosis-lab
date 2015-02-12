<?php

class Contacto extends Eloquent
{
    protected $table = 'veterinaria.contactos';
    
    public function entidad()
    {
        return $query->belongsTo('Entidad', 'ENTIDAD', 'id');
    }
}