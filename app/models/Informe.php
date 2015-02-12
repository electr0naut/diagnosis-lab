<?php

class Informe extends Eloquent
{
    protected $table = 'veterinaria.informes';
    
    public function scopeultimasEntradas($query)
    {
        # DEFAULT AMOUNT OF ROWS
        $amount = 20;

        return $query->orderBy('id', 'desc')
                     ->take($amount);
    }
    public function creadoPor()
    {
        return $this->belongsTo('Usuario', 'USUARIO', 'id'); 
    }
    public function firmadoPor()
    {
        return $this->belongsTo('Usuario', 'FIRMADO', 'id');
    }
    public function dirigidoA()
    {
        return $this->belongsTo('Contacto', 'DIRIGIDOA', 'id');
    }
    public function tejido()
    {
        return $this->hasOne('Tejido', 'TEJIDO', 'id');
    }
    public function metodoPago()
    {
        return $this->belongsTo('FormaPago', 'FORMAPAGO', 'id'); # TODO: recordar cambiar nombre
    }

}