<?php

class DiagnosticosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Diagnostico::with('muestra')->paginate(10);

		foreach($items as $diagnostico){
			$items[$diagnostico->id] = $diagnostico;
			if ($diagnostico->muestra){
				$items[$diagnostico->id]['NOMBREMUESTRA'] = $diagnostico->muestra->NOMBRE;
			}
		}

		$fillableColumns = array_values($items->getItems())[0]->fillableColumns();
		$viewableColumns = array_values($items->getItems())[0]->viewableColumns();

        return View::make('diagnosticos.index')->with('info', $items)
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
        $validation = Validator::make($input, Diagnostico::$rules);       
		$nombre = Input::only('NOMBRE');
		$muestra = Input::only('MUESTRA');

        if ($validation->passes())
        {

        	if (!Entidad::where('NOMBRE', '=', $nombre)->first() and !empty(Muestra::find($muestra)->first()))
        	{
	            Diagnostico::create($input);
				Debugbar::info(Muestra::find($muestra));
	            return Redirect::route('diagnosticos.index');  
	            //return View::make('base');
        	}
        	else {
        		//return View::make('base');
				return Redirect::route('diagnosticos.index')
	            ->with('message', 'Trying to add an existing entity or incorrect MUESTRA');
        	}
        }
        //return View::make('base');
        return Redirect::route('diagnosticos.index')
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
		$item = Diagnostico::find($id);
        if (is_null($item))
        {
            return Redirect::route('diagnosticos.index');
        }
        else {
        	$columns = $item->fillableColumns();
        }
        return View::make('diagnosticos.edit')->with('item', $item)->with('columns', $columns);
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
        $validation = Validator::make($input, Diagnostico::$rules);
        if ($validation->passes())
        {
            $item = Diagnostico::find($id);
            $item->update($input);
            return Redirect::route('diagnosticos.index', $id);
        }
        return Redirect::route('diagnosticos.edit', $id)
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
		Diagnostico::find($id)->delete();
		return Redirect::route('diagnosticos.index');
	}


}
