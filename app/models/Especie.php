<?php

class Especie extends Eloquent
{
    protected $table = 'veterinaria.especies';
    protected $guarded = array('id');
    protected $fillable = array('NOMBRE');
    
    public static $rules = array(
        'NOMBRE' => 'required',
    );
    
    public function razas()
    {
        return $query->hasMany('Raza', 'ESPECIE', 'id');
    }
}