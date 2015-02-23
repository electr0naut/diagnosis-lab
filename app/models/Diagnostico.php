<?php

class Diagnostico extends BaseCustomModel
{
    protected $table = 'veterinaria.diagnosticos';
    protected $guarded = array('id');
    protected $fillable = array('IDENTIFICADOR', 'NOMBRE', 'DESCRIPCION', 'PRONOSTICO', 'MUESTRA');
    protected $viewable = array('IDENTIFICADOR', 'NOMBRE', 'DESCRIPCION', 'PRONOSTICO', 'NOMBREMUESTRA');

    public static $rules = array(
        'NOMBRE' => 'required',
        'MUESTRA' => 'required',
    );

    public function muestra()
    {
        return $this->hasOne('Muestra', 'id', 'MUESTRA');
    }
}