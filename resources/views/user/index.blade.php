@extends('layouts.app')

@section('content')
<div class="container">
    <a type="button"  href="{{ url('user/create') }}" class="btn btn-info">Crear Usuario</a> 
    <br>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th  colspan="2" scope="colgroup">Accion</th>

          </tr>
        </thead>
        <tbody>
         @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <th >
                    <a style="top:2000px" href="{{ url('user/'.$user->id. '/edit') }}" type="button" class="btn btn-success">Editar</a>  
                </th>
                <th>
                    @include('user/destroy')

                </th>

            </tr>  
         @endforeach
        </tbody>
      </table>
      {!! $users->links() !!}

</div>
@endsection
