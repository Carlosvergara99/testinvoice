 <!-- Modal -->
 <div class="modal fade" id="CreateInvoiceModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Crear Factura</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form method="POST">
                @csrf
                
                <div class="row ">
                    <div class="form-group col-md-6">
                        <label  class="form-control-label">Cliente</label>
                        <select class="form-control"  id="customer_id">
                            <option value=""  selected >SELECCIONE</option>
                            @foreach ($clients as $client)
                              <option value="{{$client->id}}" >{{$client->name}}</option>
                            @endforeach
                        </select>

                        
       
                    </div>
                    <div class="form-group col-md-3">
                        <label for="date_issued" class="form-control-label">Fecha Emitada</label>
                        <input id="date_issued" type="date" class="form-control" name="date_issued"  required autocomplete="date_issued" placeholder="Fecha Emitida">                                
                    </div>
                    
                    <div  for="due_date" class=" form-group col-md-3">
                        <label>Fecha de Vencimiento</label>
                        <input id="due_date" type="date" class="form-control " name="due_date" required autocomplete="new-password" placeholder="Fecha de vencimiento ">
                    </div>
                </div>
                
                <div class="row">
                   
                    <div class="form-group col-md-6">
                        <label  class="form-control-label">Producto</label>
                        <select class="form-control" name="invoice_id" id="invoice_id">
                            <option value=""  selected >SELECCIONE</option>
                            @foreach ($products as $product)
                              <option value="{{$product->id}}" >{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                  
                    <div class="form-group col-md-3">
                        <label  class="form-control-label">Cantidad</label>
                         <input type="number" class="form-control" id="amount" placeholder="cantidad">                                 
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 pad-adjust">
                        <br>

                        <button type="button" id="addprodut" class="btn btn-success  float-right">Agregar produto</button>
                      </div>

                </div>
                <div class="row ">
                    <div  for="due_date" class=" form-group col-md-12">
                        <table id="list" class="table">
                            <thead>
                              <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th>Accion</th>
                              </tr>
                            </thead>
                          </table>
                    </div>
                </div>
            </form>      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="Btncreteprodut">Crear</button>

        </div>
      </div>
      
    </div>
  </div>
