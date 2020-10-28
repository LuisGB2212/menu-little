@extends('layouts.frontend')

@section('content')
    <section class="menu_area section_gap">
        <div class="container">
            <div class="row menu_inner">
                <div class="col-lg-12">
                    <h1>Orden a pagar</h1><hr>
                    <form action="" id="orderPayProducts">
                        @csrf
                        <table class="table table-responsive-lg">
                            <thead>
                                <tr align="center" class="bg-danger">
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
                        <div id="tableFooterOrder" class="justify-content-center row">
                            <div class="col-lg-4 card">
                                <div class="card-header">
                                    <h4>Datos del cliente</h4>
                                </div>
                                <div class="card-body">
                                    @include('frontend.informationUser')
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="from-group">
                                    <label for="">Número de tarjeta</label>
                                    <input type="text" name="card_number" required class="form-control" placeholder="Número de tarjeta">
                                </div>
                                <div class="from-group my-2">
                                    <label for="">Titular</label>
                                    <input type="text" name="card_name" required class="form-control" placeholder="Titular de la tarjeta">
                                </div>
                                <div class="from-group row">
                                    <div class="col-lg-4">
                                        <label for="">Mes:</label>
                                        <select name="exp_month" id="" class="form-control">
                                            <option value="">Selccionar Mes</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Año:</label>
                                        <select name="exp_year" id="" class="form-control">
                                            <option value="">Selccionar Año</option>
                                            @for ($i = date('Y'); $i < date('Y')+36; $i++)
                                                <option value="{{substr($i, -2)}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for=""> Clave CVV</label>
                                        <input type="text" name="card_cvv" required class="form-control" placeholder="Número de seguridad">
                                        
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger btn-lg">
                                Pagar <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
