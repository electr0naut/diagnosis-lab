@extends('layouts.contactos') @section('main')
<h1>Insert contacto</h1> {{ Form::open(array('route' => 'contactos.store')) }}
<ul>
    <li>
        {{ Form::label('NOMBRE', 'Name:') }} {{ Form::text('NOMBRE') }} 
    </li>
    <li>
        {{ Form::label('ENTIDAD', 'Entidad:') }} {{ Form::text('ENTIDAD') }} 
    </li>
    <li>
        {{ Form::label('CARGO', 'Cargo:') }} {{ Form::text('CARGO') }} 
    </li>
    <li>
        {{ Form::label('TELEFONO', 'Tlf:') }} {{ Form::text('TELEFONO') }} 
    </li>
    <li> {{ Form::label('CONTACTOPRINCIPAL', 'Contacto Principal:') }} {{ Form::text('CONTACTOPRINCIPAL') }} 
        {{ Form::submit('insert') }}
    </li>
</ul>
{{ Form::close() }} @if ($errors->any())
<ul>
    {{ implode('', $errors->all('
    <li class="error">:message</ li>')) }}
</ul>
@endif @stop @section('show') @if ($contactos->count())
<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Entidad</th>
            <th>Cargo</th>
            <th>Telefono</th>
            <th>Contacto Principal</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($contactos as $contacto)
        <tr>
            <td> {{$contacto->id}}</td>
            <td> {{$contacto->NOMBRE}}</td>
            <td> {{$contacto->NOMBRENTIDAD}}</td>
            <td> {{$contacto->CARGO}}</td>
            <td> {{$contacto->TELEFONO}}</td>
            <td> {{$contacto->CONTACTOPRINCIPAL}}</td>

            <td> {{ link_to_route('contactos.edit', 'Edit', array($contacto->id), array('class' => 'btn btn-info')) }}</td>
            <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('contactos.destroy', $contacto->id))) }} {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }} {{ Form::close() }}</td>
        </tr> @endforeach

    </tbody>
</table>
        {{$contactos->links()}}
@else No hay contactos @endif @stop