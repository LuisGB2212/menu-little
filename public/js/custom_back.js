$(document).on('click', '.informationOrder', function(){
    var idOrder = $(this).attr('idOrder');
    $.ajax({
        url: '/api/admin/orders/'+idOrder,
        type: 'GET',
        data: {},
        success: (response) => {
            console.log(response);
            $('#informationOrderData').html(response.data);
            //console.log(response);
        },
        error: (e) => {
            swal.fire("Error al procesar!",'Hubo un error en la orden, verifique he intente nuevamente', "error");
        }
    });
    $('#infoOrder').modal('show')
});

$(document).on('click', '.drinkFoodOrderServ', function(){
    var idDrinkFoodOrder = $(this).attr('idDrinkFoodOrder');
    $.ajax({
        url: '/api/admin/drink-food-orders/'+idDrinkFoodOrder,
        type: 'POST',
        data: {
            _token: $('[name=_token]').val(),
            _method: 'PUT',
        },
        success: (response) => {
            console.log(response);
            $('#btnOrderServ'+idDrinkFoodOrder).html(`<button type="button" class="btn btn-success">
                `+response.drinkFood.status+`
            </button>`);
            //console.log(response);
        },
        error: (e) => {
            swal.fire("Error al procesar!",'Hubo un error en la orden, verifique he intente nuevamente', "error");
        }
    });
});

$(document).on('click', '.orderUpdate', function(){
    var idOrderUp = $(this).attr('idOrderUp');
    $.ajax({
        url: '/api/admin/orders/'+idOrderUp,
        type: 'POST',
        data: {
            _token: $('[name=_token]').val(),
            _method: 'PUT',
        },
        success: (response) => {
            if(response.message == 'noPay'){
                swal.fire("Error al cerrar!",'No se puede finalizar la orden ya que no se ha pagado', "error");
                return;
            }
            swal.fire("Orden finalizado!",':)', "success");
            setTimeout('reloadPay()',2000);
        },
        error: (e) => {
            swal.fire("Error al procesar!",'Hubo un error en la orden, verifique he intente nuevamente', "error");
        }
    });
});

$(document).on('click','.orderToAddPay', function(){
    var idOrderToPay = $(this).attr('idOrderToPay');
    var totalToPay = $(this).attr('totalToPay');
    
    $('#order_id_pay').val(idOrderToPay);
    $('#montToPay').html('<strong>$'+totalToPay+'</strong>');
    $('#orderPayment').modal('show');
});

function reloadPay(){
    location.href = '/admin/pending/orders';
}

$('#orderToPay').on('submit', function(e) {
    e.preventDefault();
    //alert('sadkfshdfsdf');
    $.ajax({
        url: '/api/admin/check-orders',
        type: 'post',
        data: $(this).serialize(),
        success: (response) => {
            if(response.message == 'error'){
                swal.fire("Error al procesar!",'Cantidad recibida no cubre el total de la orden', "error");
                return;
            }
            
            swal.fire("Orden cobrado!",'Orden cobrado, <br> <strong>cambio a entregar: $'+response.change+' <strong>', "success");
            $('#orderPayment').modal('hide');

            setTimeout('reloadPay()',4000);
        },
        error: (e) => {
            swal.fire("Error al procesar!",'Hubo un error en la orden, verifique he intente nuevamente', "error");
        }
    })
});
    