@extends('layouts.general') @section('main')
<h1>Edit Entidad</h1> {{ Form::model($item, array('method' => 'PATCH', 'route' => array('diagnosticos.update', $item->id))) }}
<ul>
	@foreach ($columns as $column)
    <li>
        {{ Form::label($column, $column) }} {{ Form::text($column) }}
    </li>
    @endforeach
    <li>
        {{ Form::submit('Update', array('class' => 'btn btn- info')) }} {{ link_to_route('diagnosticos.show', 'Cancel', 'diagnosticos.index', array('class' => 'btn')) }}
    </li>
</ul>
{{ Form::close() }} @if ($errors->any())
<ul>
    {{ implode('', $errors->all('
    <li class="error">:message</ li>')) }}
</ul>
@endif
 @stop @section('show') @stop
