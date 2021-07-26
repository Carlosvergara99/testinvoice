let products = new Array();

function productDelete(data,pramert) {
    for (let index = 0; index < products.length; index++) {
        if (index == pramert) {
            products.splice(index, 1)
        }
    }
    $(data).parents("tr").remove();
}
$(document).ready(function() {
    $("#addprodut").click(function(){
    const dato ={
        'product_id': $("#invoice_id").val(),
        'amount': $("#amount").val()
    }
    if (dato.product_id == '' ) {
        Swal.fire(
            'Oops...',
            'se debe seleccionar un producto ',
            'error'
          )
    } else if(dato.amount <= 0 && dato.amount == '' ){
        Swal.fire(
            'Oops...',
            'la cantidad debe ser mayor a 0 y es obligatoria ',
            'error'
          )
    }else{
        $.ajax({
            data: dato,
            url: "api/invoice/getprice",
            type: "GET",
            success: function (data) {
            let dataproducts = products.filter(product=> product.name === data.name)
            if (dataproducts.length >0) {
                Swal.fire(
                    'Oops...',
                    'el producto ya esta agregado',
                    'error'
                  )
             }else{
                products.push(data);
                var rows
                $("#list tbody").remove();

                $("#list").append("<tbody></tbody>");

                for (let index = 0; index < products.length; index++) {
                 rows+=  "<tr>" +
                "<td>"+products[index].name+"</td>" +
                "<td>"+products[index].amount+"</td>" +
                "<td>"+products[index].price+"</td>" +
                "<td>"+products[index].total_value+"</td>" +

                "<td>" + "<button type='button' onclick='productDelete(this,"+index+");'class='btn  btn-outline-danger btn-xs remove'>X" +
                "</button>" +
                "</td>" +
                "</tr>"
                }
               
                $("#list tbody").append(rows)
                $("#invoice_id").val('')
                $("#amount").val('')
              }
         

            },
            error: function (data) {
                Swal.fire(
                    'Oops...',
                     'error servidor',
                     'error'
                  )
            }
        });
    }
     
      });

      $("#Btncreteprodut").click(function(){ 
        const data ={
        'customer_id': $("#customer_id").val(),
        'date_issued':$("#date_issued").val(),
        'due_date':$("#due_date").val(),
        'products': products
        }
        if (data.customer_id =='') {
            Swal.fire(
                'Oops...',
                 'el cliente es requerido',
                 'error'
              )
        }
        if (data.date_issued=='' ) {
            Swal.fire(
                'Oops...',
                 'la fecha emitada es requerida',
                 'error'
              )
        }
        if (data.due_date =='' ) {
            Swal.fire(
                'Oops...',
                 'la fecha de vencimiento es requerida',
                 'error'
              )
        }
        if (data.products.length ==0) {
            Swal.fire(
                'Oops...',
                 'Debes agregar al menos un producto',
                 'error'
              )

        }
        $.ajax({
            data: data,
            url: "api/invoice/save",
            type: "POST",
            success: function (data) {
                $("#list tbody").remove();
                Swal.fire(
                    '',
                    'la información se ha registrado satisfactoriamente !',
                   'success'
                  )   
                products= [];
                $("#customer_id").val('');
                $("#date_issued").val('');
                $("#due_date").val('');
                location.reload();
                $('#CreateInvoiceModal').modal('hide');

            },
            error: function (data) {
                Swal.fire(
                    'Oops...',
                     'error servidor',
                     'error'
                  )
            }
        });

        
    });

    $('#UpdateInvoiceModal').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget)   
       var id = button.data('id') 
       var invoice = button.data('id') 
       var customer_id = button.data('customer_id') 
       var date_issued = button.data('date_issued') 
       var due_date = button.data('due_date') 

       var modal = $(this)
       modal.find('.modal-body #numerinvoice').val('FV-21-000'+invoice)
       modal.find('.modal-body #id').val(id)
       modal.find('.modal-body #edit_customer_id').val(customer_id)
       modal.find('.modal-body #edit_date_issued').val(date_issued)
       modal.find('.modal-body #edit_due_date').val(due_date)
       products= [];

       const data={
           'id': id
       }

       $.ajax({
        data: data,
        url: "api/invoice/productsget",
        type: "GET",
        success: function (data) {
           for (let index = 0; index < data.length; index++) {
            products.push(data[index]);

           }
            $("#listedit tbody").remove();

            $("#listedit").append("<tbody></tbody>");
            var rows
            for (let index = 0; index < products.length; index++) {
             rows+=  "<tr>" +
            "<td>"+products[index].name+"</td>" +
            "<td>"+products[index].amount+"</td>" +
            "<td>"+products[index].price+"</td>" +
            "<td>"+products[index].total_value+"</td>" +

            "<td>" + "<button type='button' onclick='productDelete(this,"+index+");'class='btn btn-outline-danger btn-xs remove'>X" +
            "</button>" +
            "</td>" +
            "</tr>"
            }
           
            $("#listedit tbody").append(rows)
        },
        error: function (data) {
            Swal.fire(
                'Oops...',
                 'error servidor',
                 'error'
              )
        }
    });
    
    });

    $("#editprodut").click(function(){
        const dato ={
            'product_id': $("#edit_invoice_id").val(),
            'amount': $("#edit_amount").val()
        }
        if (dato.product_id == '' ) {
            Swal.fire(
                'Oops...',
                'se debe seleccionar un producto ',
                'error'
              )
        } else if(dato.amount <= 0 && dato.amount == '' ){
            Swal.fire(
                'Oops...',
                'la cantidad debe ser mayor a 0 y es obligatoria ',
                'error'
              )
        }else{
            $.ajax({
                data: dato,
                url: "api/invoice/getprice",
                type: "GET",
                success: function (data) {
                let dataproducts = products.filter(product=> product.name === data.name)
                if (dataproducts.length >0) {
                    Swal.fire(
                        'Oops...',
                        'el producto ya esta agregado',
                        'error'
                      )
                 }else{
                    products.push(data);
                    var rows
                    $("#listedit tbody").remove();
    
                    $("#listedit").append("<tbody></tbody>");
    
                    for (let index = 0; index < products.length; index++) {
                     rows+=  "<tr>" +
                    "<td>"+products[index].name+"</td>" +
                    "<td>"+products[index].amount+"</td>" +
                    "<td>"+products[index].price+"</td>" +
                    "<td>"+products[index].total_value+"</td>" +
    
                    "<td>" + "<button type='button' onclick='productDelete(this,"+index+");'class='btn btn-outline-danger btn-xs remove'>X" +
                    "</button>" +
                    "</td>" +
                    "</tr>"
                    }
                   
                    $("#listedit tbody").append(rows)
                    $("#edit_invoice_id").val('')
                    $("#edit_amount").val('')
                  }
             
    
                },
                error: function (data) {
                    Swal.fire(
                        'Oops...',
                         'error servidor',
                         'error'
                      )
                }
            });
        }
         
     });

     $("#BtnEditProdut").click(function(){ 
        const data ={
         'id':$("#id").val(),
        'customer_id': $("#edit_customer_id").val(),
        'date_issued':$("#edit_date_issued").val(),
        'due_date':$("#edit_due_date").val(),
        'products': products
        }
        if (data.customer_id =='') {
            Swal.fire(
                'Oops...',
                 'el cliente es requerido',
                 'error'
              )
        }
        if (data.date_issued=='' ) {
            Swal.fire(
                'Oops...',
                 'la fecha emitada es requerida',
                 'error'
              )
        }
        if (data.due_date =='' ) {
            Swal.fire(
                'Oops...',
                 'la fecha de vencimiento es requerida',
                 'error'
              )
        }
        if (data.products.length ==0) {
            Swal.fire(
                'Oops...',
                 'Debes agregar al menos un producto',
                 'error'
              )

        }
        $.ajax({
            data: data,
            url: "api/invoice/update",
            type: "POST",
            success: function (data) {
                $("#listedit tbody").remove();
               
                products= [];
                // $("#customer_id").val('');
                // $("#date_issued").val('');
                // $("#due_date").val('');
                // location.reload();
                $('#UpdateInvoiceModal').modal('hide');
                 location.reload();
                Swal.fire(
                    '',
                    'la información se ha Actualizado satisfactoriamente !',
                   'success'
                  )  

            },
            error: function (data) {
                Swal.fire(
                    'Oops...',
                     'error servidor',
                     'error'
                  )
            }
        });

        
    });

    $("#BtnFinalizeInvoice").click(function(){ 
        const data ={
            'id': $("#id").val(),
        }
        $.ajax({
            data: data,
            url: "api/invoice/changestatus",
            type: "POST",
            success: function (data) {
                location.reload();
                Swal.fire(
                    '',
                    'la factura se ha finalizado satisfactoriamente !',
                   'success'
                  )   
            },
            error: function (data) {
                Swal.fire(
                    'Oops...',
                     'error servidor',
                     'error'
                  )
            }
        });
    });
});