@extends('layouts.razas') @section('main')
<h1>Edit Raza</h1> {{ Form::model($raza, array('method' => 'PATCH', 'route' => array('razas.update', $raza->id))) }}
<ul>
    <li>
        {{ Form::label('NOMBRE', 'Name:') }} {{ Form::text('NOMBRE') }}
        {{ Form::label('ESPECIE', 'Especie:') }} {{ Form::text('ESPECIE') }}
    </li>
    <li>
        {{ Form::submit('Update', array('class' => 'btn btn- info')) }} {{ link_to_route('razas.show', 'Cancel', $raza->id, array('class' => 'btn')) }}
    </li>
</ul>
{{ Form::close() }} @if ($errors->any())
<ul>
    {{ implode('', $errors->all('
    <li class="error">:message</ li>')) }}
</ul>
@endif @stop

