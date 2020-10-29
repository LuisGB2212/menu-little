<table class="table table-responsive-lg">
    <thead>
        <tr align="center" class="{{$payOrder->checkOrders->count() > 0 ? 'bg-success' : 'bg-danger'}}">
            <th colspan="5">
                <h2>Orden</h2>
            </th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="tableOrder">
        @foreach ($payOrder->drinkFoodOrders as $order)
            <tr id="orderOrder{{$order->id}}">
                <td>
                    <strong>{{$order->drinkFood->name}}</strong>
                    <br>{{$order->details != null ? '('.$order->details.')' : '' }}
                </td>
                <td>{{$order->quantity}}</td>
                <td>${{number_format($order->price,2,'.',',')}}</td>
                <td>${{$order->total()}}</td>
                <td>
                    {{-- <button class="btn btn-danger deleteorder" idorder="{{$order->id}}" idProduct="{{$order->rowId}}">
                        <i class="fa fa-times"></i>
                    </button>     --}}
                </td>
            </tr>
        @endforeach 
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                <h4>Total a pagar</h4>
            </td>
            <td colspan="2">
                <h4>${{$payOrder->total()}}</h4>
            </td>
        </tr>
    </tfoot>
</table>