@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha de vencimiento</th>
            <th>Cantidad</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->due_date}}</td>
                <td>{{$product->amount}}</td>
                <td>{{$product->price}}</td>
            </tr>  
         @endforeach
        </tbody>
      </table>
      {!! $products->links() !!}

</div>
@endsection