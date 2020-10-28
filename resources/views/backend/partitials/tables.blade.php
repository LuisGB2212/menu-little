<div class="row justify-content-center">
    <table class="table table-responsive-lg table-hover table-striped">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Numero de Orden
                </th>
                <th>
                    Mesa
                </th>
                <th>
                    Hora
                </th>
                <th>
                    Estatus de pago
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$order->number_order}}</td>
                    <td>{{$order->table_id != null ? $order->table->name.' '.$order->table->number : $order->typeOrder->name}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        @if ($order->checkOrders->count() > 0)
                            Pagado <br>
                            <strong>{{$order->checkOrders[0]->payment_method}}</strong>
                        @else
                            Pendiente
                        @endif
                    </td>
                    <td>
                        <button type="button" idOrder="{{$order->id}}" class="informationOrder btn btn-danger">
                            <i class="fa fa-eye"></i>
                        </button>
                        @if ($order->status != 'cerrado')
                            <button type="button" idOrderUp="{{$order->id}}" class="orderUpdate btn btn-danger">
                                Cerrar Orden
                            </button>
                        @endif
                        
                        @if ($order->checkOrders->count() < 1)
                            <button type="button" totalToPay="{{$order->total()}}" idOrderToPay="{{$order->id}}" class="orderToAddPay btn btn-danger">
                                Cobrar
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>