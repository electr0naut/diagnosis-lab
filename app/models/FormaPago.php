<?php

class FormaPago extends Eloquent
{
    protected $table = 'forma_pago.contactos';
    
    public function creador()
    {
        return $query->belongsTo('Usuario', 'PADRE', 'id');
    }
}