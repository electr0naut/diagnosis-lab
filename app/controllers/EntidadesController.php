<?php

class EntidadesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entidades = [];
		foreach(Entidad::with('formaPago')->get() as $entidad){
			$entidades[$entidad->id] = $entidad;
			if ($entidad->formaPago){
				$entidades[$entidad->id]['NOMBREFORMAPAGO'] = $entidad->formaPago->NOMBRE;
			}
		}

		$fillableColumns = array_values($entidades)[0]->fillableColumns();
		$viewableColumns = array_values($entidades)[0]->viewableColumns();

        return View::make('entidades.index')->with('info', $entidades)
        									->with('viewableColumns', $viewableColumns)
        									->with('fillableColumns', $fillableColumns);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $validation = Validator::make($input, Entidad::$rules);       
		$nombre = Input::only('NOMBRE');
		$formapago = Input::only('FORMAPAGO');

        if ($validation->passes())
        {

        	if (!Entidad::where('NOMBRE', '=', $nombre)->first() and !empty(FormaPago::find($formapago)->first()))
        	{
	            Entidad::create($input);
				Debugbar::info(FormaPago::find($formapago));
	            return Redirect::route('entidades.index');  
	            //return View::make('base');
        	}
        	else {
        		//return View::make('base');
				return Redirect::route('entidades.index')
	            ->with('message', 'Trying to add an existing entity or incorrect FORMAPAGO');
        	}
        }
        //return View::make('base');
        return Redirect::route('entidades.index')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = Entidad::find($id);
        if (is_null($item))
        {
            return Redirect::route('entidades.index');
        }
        else {
        	$columns = $item->fillableColumns();
        }
        return View::make('entidades.edit')->with('item', $item)->with('columns', $columns);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::all();
        $validation = Validator::make($input, Entidad::$rules);
        if ($validation->passes())
        {
            $item = Entidad::find($id);
            $item->update($input);
            return Redirect::route('entidades.show', $id);
        }
        return Redirect::route('entidades.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Entidad::find($id)->delete();
		return Redirect::route('entidades.index');
	}


}
