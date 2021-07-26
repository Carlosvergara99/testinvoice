@extends('layouts.app')

@section('content')
<div class="container">
    <a type="button"  href="{{ url('customer/create') }}" class="btn btn-info">Crear Cliente</a> 
    <br>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Nit</th>
            <th>Direccion</th>
            <th>Cuidad</th>
            <th>Email</th>
            <th  colspan="2" scope="colgroup">Accion</th>

          </tr>
        </thead>
        <tbody>
         @foreach ($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->nit}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->city}}</td>
                <td>{{$customer->email}}</td>
                <th >
                    <a style="top:2000px" href="{{ url('customer/'.$customer->id. '/edit') }}" type="button" class="btn btn-success">Editar</a>  
                </th>
                <th>
                    @include('customer/destroy')

                </th>

            </tr>  
         @endforeach
        </tbody>
      </table>
</div>
@endsection