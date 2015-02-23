@extends('layouts.contactos') @section('main')
<h1>Edit contacto</h1> {{ Form::model($contacto, array('method' => 'PATCH', 'route' => array('contactos.update', $contacto->id))) }}
<ul>
    <li>
        {{ Form::label('NOMBRE', 'Name:') }} {{ Form::text('NOMBRE') }}
        {{ Form::label('ENTIDAD', 'Entidad:') }} {{ Form::text('ENTIDAD') }}
        {{ Form::label('CARGO', 'Cargo:') }} {{ Form::text('CARGO') }}
        {{ Form::label('TELEFONO', 'Telefono:') }} {{ Form::text('TELEFONO') }}
        {{ Form::label('CONTACTOPRINCIPAL', 'Contacto Principal:') }} {{ Form::text('CONTACTOPRINCIPAL') }}
    </li>
    <li>
        {{ Form::submit('Update', array('class' => 'btn btn- info')) }} {{ link_to_route('contactos.show', 'Cancel', $contacto->id, array('class' => 'btn')) }}
    </li>
</ul>
{{ Form::close() }} @if ($errors->any())
<ul>
    {{ implode('', $errors->all('
    <li class="error">:message</ li>')) }}
</ul>
@endif @stop

