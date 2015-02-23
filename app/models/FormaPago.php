<?php

class FormaPago extends Eloquent
{
    protected $table = 'veterinaria.forma_pago';
    protected $guarded = array('id');

    public function padre()
    {
        return $query->hasOne('FormaPago', 'PADRE', 'id');
    }
}