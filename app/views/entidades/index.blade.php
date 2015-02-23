@extends('layouts.general') @section('main')

<h1>Insert Entidad</h1> {{ Form::open(array('route' => 'entidades.store')) }}
<ul>
    @foreach ($fillableColumns as $column)
    <li>
        {{ Form::label($column, $column) }} {{ Form::text($column) }} 
    </li>
    @endforeach
    <li>{{ Form::submit('insert') }}</li>
</ul>
{{ Form::close() }} @if ($errors->any())
<ul>
    {{ implode('', $errors->all('
    <li class="error">:message</ li>')) }}
</ul>
@endif
@stop
@section('show')
<div class="table-responsive">
    <table class="table table-striped table-bordered">

        <thead>
            
            <tr>@foreach ($viewableColumns as $column)
                <th> {{ $column }} </th>
                @endforeach
            </tr> 
        </thead>
        <tbody>
            @foreach ($info as $item)
                <tr>
                    @foreach ($viewableColumns as $column)
                    <td class="col-sm-1">  {{$item[$column]}} </td>
                    @endforeach
                    <td> {{ link_to_route('entidades.edit', 'Edit', array($item->id), array('class' => 'btn btn-info')) }}</td>
                    <td>{{ Form::open(array('method' => 'DELETE', 'route' => array('entidades.destroy', $item->id))) }} {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }} {{ Form::close() }}</td>                        
                </tr> 
                @endforeach
        </tbody>
    </table>
</div>
@stop