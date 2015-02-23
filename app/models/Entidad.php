<?php

class Entidad extends Eloquent
{
    protected $table = 'veterinaria.entidades';
    protected $guarded = array('id');
    protected $fillable = array('NOMBRE', 'NOMBREFACTURACION', 'DIRECCION', 'POBLACION', 'CP', 'IDENTIFICACIONFISCAL', 'TELEFONO1', 'TELEFONO2', 'FAX', 'EMAIL', 'FORMAPAGO', 'NOMBREINFORME', 'PROVINCIA', 'FORMAENVIO', 'ENVIARFACTURA', 'NOTAS', 'FECHABAJA');
    protected $viewable = array('id', 'NOMBRE', 'DIRECCION', 'POBLACION', 'CP', 'IDENTIFICACIONFISCAL', 'TELEFONO1', 'EMAIL', 'NOMBREFORMAPAGO');

    
    public static $rules = array(
        'NOMBRE' => 'required',
        'FORMAPAGO' => 'required',
    );
    
    public function formaPago()
    {
        return $this->hasOne('FormaPago', 'id', 'FORMAPAGO');
    }

    public function viewableColumns()
    {
        return $this->viewable;
    }

    public function fillableColumns()
    {
        return $this->fillable;
    }
}