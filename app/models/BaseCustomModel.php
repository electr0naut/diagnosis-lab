<?php

class BaseCustomModel extends Eloquent
{
    protected $fillable = array();
    protected $viewable = array();


    public function viewableColumns()
    {
        return $this->viewable;
    }

    public function fillableColumns()
    {
        return $this->fillable;
    }
}