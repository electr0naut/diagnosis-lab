@extends('layouts.especies') @section('main')
<h1>Insert Especie</h1> {{ Form::open(array('route' => 'especies.store')) }}
<ul>
    <li>
        {{ Form::label('NOMBRE', 'Name:') }} {{ Form::text('NOMBRE') }} {{ Form::submit('insert') }}
    </li>
</ul>
{{ Form::close() }} @if ($errors->any())
<ul>
    {{ implode('', $errors->all('
    <li class="error">:message</ li>')) }}
</ul>
@endif @stop @section('show') @if ($especies->count())
<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($especies as $especie)
        <tr>
            <td> {{$especie->id}}</td>
            <td> {{$especie->NOMBRE}}</td>

            <td> {{ link_to_route('especies.edit', 'Edit', array($especie->id), array('class' => 'btn btn-info')) }}</td>
            <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('especies.destroy', $especie->id))) }} {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }} {{ Form::close() }}</td>
        </tr> @endforeach
    </tbody>
    <!--                       <a href="{{ action("EspeciesController@create") }}">link</a>-->
</table>
@else No hay especies @endif @stop