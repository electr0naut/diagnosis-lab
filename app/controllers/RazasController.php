<?php

class RazasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $razas = Raza::paginate(5);
        foreach ($razas as $raza => $especie) {
			$temp = Especie::find($especie['ESPECIE']);
			$razas[$raza]['NOMBRESPECIE'] = $temp['NOMBRE'];
			$especiesList = Especie::find($especie['ESPECIE'])->razas; 
        }

        return View::make('razas.index', compact('razas'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $razas = Raza::all();
        return View::make('razas.index', compact('razas')); 
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $validation = Validator::make($input, Raza::$rules);        
        if ($validation->passes())
        {
        	$nombre = Input::only('NOMBRE');
        	if (!Raza::where('NOMBRE', '=', $nombre)->first()){
	            Raza::create($input);
	            return Redirect::route('razas.index');        		
        	}
        	else {
				return Redirect::route('razas.index')
	            ->with('message', 'Trying to add an existing race');
        	}
        }
        return Redirect::route('razas.index')
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
        $razas = Raza::all();
        foreach ($razas as $raza => $especie) {
        	$temp = Especie::find($especie['ESPECIE']);
        	$razas[$raza]['NOMBRESPECIE'] = $temp['NOMBRE'];
        }
        return View::make('razas.index')->with(compact('razas'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$raza = Raza::find($id);
        if (is_null($raza))
        {
            return Redirect::route('razas.index');
        }
        return View::make('razas.edit', compact('raza'));
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
        $validation = Validator::make($input, Raza::$rules);
        if ($validation->passes())
        {
            $raza = Raza::find($id);
            $raza->update($input);
            return Redirect::route('razas.show', $id);
        }
        return Redirect::route('razas.edit', $id)
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
		Raza::find($id)->delete();
		return Redirect::route('razas.index');
	}
	/**
	 * List the items under a same Especie category.
	 *
	 * @param  int  $id
	 * @return Response
	 */	
	public function especiesList($id)
	{
		#$especiesList = Especies::where('id', '=', $id)->get();#->paginate(5);

		$especiesList = Especie::where('NOMBRE', '=', $id)->first()->razas;#find($id)->razas;
		return View::make('razas.especiesList')->with(compact('especiesList'));
	}

}
