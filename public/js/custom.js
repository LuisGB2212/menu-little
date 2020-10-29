$(document).on('click', '.addProductCar', function(){
    var idProduct = $(this).attr('idProduct');
    var info = document.getElementById('informationProduct');
    $('#modalDrink_food_id').val(idProduct);
    $.ajax({
        url: '/api/drink-foods/'+idProduct,
        type: 'GET',
        data: {},
        success: (response) => {
            $('#informationProduct').html(`<h4>`+response.data.name+`</h4><br>
                <span>(`+response.data.description+`)</span>
                <br><span>Precio: `+response.data.price+`</span>
            `);
            //console.log(response);
        },
        error: (e) => {
            swal.fire("Error al procesar!",'Hubo un error, verifique he intente nuevamente', "error");
        }
    });
    $('#addProduct').modal('show')
});

$('#addProductToCar').on('submit', function(e) {
    e.preventDefault();
    //alert('sadkfshdfsdf');
    $.ajax({
        url: '/api/products',
        type: 'post',
        data: $(this).serialize(),
        success: (response) => {
            $('.totalProduct').html(response.totalProduct);
            swal.fire("Producto agregado!",'Para enviar la orden, ve al apartado de ordenes', "success");
            $(this).trigger('reset');
            $('#addProduct').modal('hide')
        },
        error: (e) => {
            swal.fire("Error al procesar!",'Hubo un error, verifique he intente nuevamente', "error");
        }
    })
});

$(document).on('click','.deleteItem', function(){
    var idProduct = $(this).attr('idProduct');
    var idItem = $(this).attr('idItem');
    var token = $('[name=_token]').val();
    $.ajax({
        url : '/api/products/'+idProduct,
        type: 'DELETE',
        data:{
            _token: token
        },
        success: (response) => {
            $('#item'+idItem).remove();
            if(response.totalProduct < 1){
                $('#tableFooterOrder').html(`<div class="col-lg-12" align="center">
                    <h4>No tiene productos a ordenar</h4>
                </div>`);
            }

            $('.totalProduct').html(response.totalProduct);
        },
        error: (e) => {
            swal.fire("Error al procesar!",'Hubo un error, verifique he intente nuevamente', "error");
        }

    });
})

function reloadPayTo(idOrder){
    location.href = '/check-out/'+idOrder;
}

$('#orderProducts').on('submit', function(e){
    e.preventDefault();
    $.ajax({
        url:'/api/orders',
        type:'POST',
        data:$(this).serialize(),
        success: (response) => {
            if(response.message == 'error'){
                location.href = '/register';
                return;
            }

            swal.fire("Orden procesada!",'Puede realizar el pago de su orden', "success");

            $('.totalProduct').html(response.totalProduct);
            $('#tableOrder').html('');
            $('#tableFooterOrder').html('');
            location.href = '/check-out/'+response.data.number_order;
        },
        error: (e) => {
            swal.fire("Error al procesar!",'Hubo un error, verifique he intente nuevamente', "error");
        }
    });
});

$('#orderPayProducts').on('submit', function(e){
    e.preventDefault();
    $.ajax({
        url:'/api/check-out',
        type:'POST',
        data:$(this).serialize(),
        success: (response) => {
            console.log(response);
            if(response[0].transactionStatus != 'APPROVED'){
                swal.fire("Pago no aprobado!",'Intenta de nuevo o utiliza otra tarjeta', "error");
                return;
            }

            swal.fire("Pago aprobado!",'So orden esta en proceso, gracias por su preferencia', "success");
            
            setTimeout("reloadPayTo('"+response[1].number_order+"')",3000);
        },
        error: (errors) => {
            swal.fire("Pago no aprobado!",'Intenta de nuevo o utiliza otra tarjeta', "error");
            console.log(errors);
        }
    });
});