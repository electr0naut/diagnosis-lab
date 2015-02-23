@extends('layouts.razas') @section('main')
<h1>Insert Raza</h1> {{ Form::open(array('route' => 'razas.store')) }}
<ul>
    <li>
        {{ Form::label('NOMBRE', 'Name:') }} {{ Form::text('NOMBRE') }} </li>
    <li>
        {{ Form::label('ESPECIE', 'Especie:') }} {{ Form::text('ESPECIE') }} 
        {{ Form::submit('insert') }}
    </li>
</ul>
{{ Form::close() }} @if ($errors->any())
<ul>
    {{ implode('', $errors->all('
    <li class="error">:message</ li>')) }}
</ul>
@endif @stop @section('show') @if ($razas->count())
<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>id</th>
            <th>Especie</th>
            <th>Name</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($razas as $raza)
        <tr>
            <td> {{$raza->id}}</td>
            <td> {{link_to_route('razas.especiesList', $raza->NOMBRESPECIE, array('id' => $raza->NOMBRESPECIE))}}</td>
            <td> {{$raza->NOMBRE}}</td>

            <td> {{ link_to_route('razas.edit', 'Edit', array($raza->id), array('class' => 'btn btn-info')) }}</td>
            <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('razas.destroy', $raza->id))) }} {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }} {{ Form::close() }}</td>
        </tr> @endforeach
    </tbody>
    <!--                       <a href="{{ action("EspeciesController@create") }}">link</a>-->
</table>
        {{$razas->links()}}
@else No hay razas @endif @stop