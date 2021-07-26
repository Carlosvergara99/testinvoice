<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
    <style>
     .img{
       margin-right: 10px;
     }
          </style>
</head>
<body>
    <img  class="float-right" src="{{ public_path('img/logo.png') }}"  style="width:100px; ">

    <h1>Factura</h1>

    <br>

    {{-- <p class="float-right">N° DE FACTURA : ES -001  <h5>DE  </p></h5> --}}
    <div class="float-right">
        <p >N° DE FACTURA : FV-21-000{{$invoices->id}}</p>
        <p >FECHA : {{$invoices->date_issued}}</p>
        <p >N° DE PEDIDO :17302021</p>
        <p >FECHA DE VENCIMIENTO :{{$invoices->due_date}}</p>
    </div>
      
    <div class="float-left">
        <h5>DATOS DEL CLIENTE</h5>
        <p >NOMBRE:{{$invoices->customer->name}}  </p>
        <p>DIRECCION:{{$invoices->customer->address }},{{$invoices->customer->city}}</p>
        <p>EMAIL:{{$invoices->customer->email }} </p>
        <p>TEL: {{$invoices->customer->phone}}</p>

    </div><br><br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Total</th>

          </tr>
        </thead>
        <tbody>
         @foreach ($invoices->invoiceproduct as $data)
           <tr>
            <td>{{$data->product[0]->name}}</td>
            <td>{{$data->pivot->amount}}</td>
            <td>{{$data->product[0]->price}}</td>       
            <td>{{$data->pivot->total_value}}</td>
          </tr>
         @endforeach
        </tbody>
      </table>
     <br>
     <br>
     <div class="float-right">
        <p > <strong>TOTAL A PAGAR:{{$total}}</strong></p>
    </div> 
    <br><br>
    <img  class="float-right" src="{{ public_path('img/firma.jpg') }}" style="width:300px; "  >

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
</body>
</html>