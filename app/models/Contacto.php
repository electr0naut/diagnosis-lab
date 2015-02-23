<?php

class Contacto extends Eloquent
{
    protected $table = 'veterinaria.contactos';

    protected $guarded = array('id');
    protected $fillable = array('NOMBRE', 'ENTIDAD', 'CARGO', 'TELEFONO', 'CONTACTOPRINCIPAL');    
    
    public static $rules = array(
        'NOMBRE' => 'required',
        'CARGO' => 'required',
        'ENTIDAD' => 'required',
    );

    public function entidad()
    {
        return $query->belongsTo('Entidad', 'ENTIDAD', 'id');
    }
}