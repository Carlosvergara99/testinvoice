@extends('layouts.app')

@section('content')
<div class="container">
    <a type="button" data-toggle="modal" data-target="#CreateInvoiceModal" class="btn btn-info">Crear Factura</a> 
    @include('invoice/create')
    <br>
    <table class="table table-hover">
        <thead>
          <tr>
            <th># de Factura</th>
            <th>Cliente</th>
            <th>Productos</th>
            <th>Fecha Emitada</th>
            <th>fecha de vencimiento</th>
            <th  colspan="2" scope="colgroup">Accion</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($invoices as $invoice)
            <tr>
                <td>FV-21-000{{$invoice->id}}</td>
                
                <td>{{$invoice->customer->name}}</td>
                <th>
                  @foreach ($invoice->invoiceproduct as $invoiceproduct)
                  @if ($invoiceproduct->pivot->status == 1)
                     <span class="badge badge-primary">{{$invoiceproduct->product[0]->name}}</span>
                  @endif
                    
                 @endforeach
              </th>

                <td>{{$invoice->date_issued}}</td>
                <td>{{$invoice->due_date}}</td>
               
                <th >
                  @if ($invoice->active == 1)
                  <a type="button" data-toggle="modal" data-target="#UpdateInvoiceModal" data-id="{{$invoice->id}}" data-customer_id="{{$invoice->customer_id}}"  data-date_issued="{{$invoice->date_issued}}"  data-due_date="{{$invoice->due_date}}" class="btn btn-success">Editar</a> 
                  @endif
                  <a type="button"  href="{{ url('invoice/'.$invoice->id.'/generatepdf') }}" class="btn btn-light"><i class="fas fa-file-pdf"></i> </a> 


                </th>
                <th>
                </th>

            </tr>  
         @endforeach
        </tbody>
      </table>
                          @include('invoice/update')
                          {!! $invoices->links() !!}

</div>
@endsection