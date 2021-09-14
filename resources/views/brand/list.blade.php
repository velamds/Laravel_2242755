@extends('layout')
@section('title','Marcas')
@section('encabezado','Lista de Marcas')
@section('content')
<a href="{{ route('brand.form')}}" class="btn btn-primary">Nueva Marca</a>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->name }}</td>
                <td>
                    <a href="{{ route('brand.form' , ['id'=> $brand->id]) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('brand.delete', ['id'=>$brand->id])}}" class="btn btn-danger">Borrar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection