<?php

class TestingController extends BaseController {

    public function basicPage()
    {
        $queryData = Especie::all();
	    return View::make('index')->with('data', $queryData);
    }
    
    public function determineAction($params)
    {
        $queryData = "";
        return View::make('index')->with('params', $params);
    }
    public function retrieveEspecies()
	{
        $queryData = Especie::all();
	    return $queryData;
	}
}