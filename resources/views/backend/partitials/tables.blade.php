<div class="row justify-content-center">
    {{-- @foreach ($type->categoryTypes as $index => $category)
        @php
            $par = $index%2;
        @endphp
        <div class="col-lg-5 {{ $par != 0 ? 'offset-1' : ''}}">
            <div class="menu_list">
                <h1>{{$category->category->category_name}}</h1>
                <ul class="list">
                    @foreach ($category->category->drinkFoods as $drinkFood)
                        <li>
                            <h4>{{$drinkFood->name}}
                                <span>${{number_format($drinkFood->price,2,'.',',')}} <br>
                                <button class="btn btn-danger btn-sm addProductCar" idProduct="{{$drinkFood->id}}">
                                    <span class="text-custom">Agregar <i class="fa fa-plus"></i></span>
                                </button>
                                </span>
                            </h4>
                            <p>({{$drinkFood->description}})</p>
                        </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
    @endforeach --}}
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
                            </button
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