@extends('layouts.especies') @section('main')
<h1>Edit Especie</h1> {{ Form::model($especie, array('method' => 'PATCH', 'route' => array('especies.update', $especie->id))) }}
<ul>
    <li>
        {{ Form::label('NOMBRE', 'Name:') }} {{ Form::text('NOMBRE') }}
    </li>
    <li>
        {{ Form::submit('Update', array('class' => 'btn btn- info')) }} {{ link_to_route('especies.show', 'Cancel', $especie->id, array('class' => 'btn')) }}
    </li>
</ul>
{{ Form::close() }} @if ($errors->any())
<ul>
    {{ implode('', $errors->all('
    <li class="error">:message</ li>')) }}
</ul>
@endif @stop

