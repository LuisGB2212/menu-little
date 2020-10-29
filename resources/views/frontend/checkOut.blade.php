@extends('layouts.frontend')

@section('content')
    <section class="menu_area section_gap">
        <div class="container">
            <div class="row menu_inner">
                <div class="col-lg-12">
                    <h1>Orden a pagar</h1><hr>
                    @include('frontend.table_order',['payOrder' => $payOrder])
                    @if ($payOrder->checkOrders->count() > 0)
                        <div class="col-lg-12" align="center">
                            <h1>Orden aprobado</h1>
                            <br>
                            <strong><h3>Metodo de pago: {{$payOrder->checkOrders->last()->	payment_method}}</h3></strong>
                            <strong><h3>Pago: {{$payOrder->checkOrders->last()->transaction_status}}</h3></strong>
                        </div>
                    @else
                        <form action="" id="orderPayProducts">
                            @csrf

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
                                    <div class="col-lg-12" align="center">
                                        <img src="{{ asset('images/fiserv_logo.svg.png') }}" class="img-fluid" width="100px" alt="">
                                    </div>
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
                                    <br>
                                    <div class="col-lg-12 row justify-content-center align-items-center">
                                        <div class="col-lg-3">
                                            <img src="{{ asset('images/visaPartner.png') }}" width="100px" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <img src="{{ asset('images/MasterCard.png') }}" width="80px" alt="">
                                        </div>
                                        <div class="col-lg-4">
                                            <img src="{{ asset('images/logo_scotiabank.png') }}" width="150px" alt="">
                                        </div>
                                        <div class="col-lg-2">
                                            <img src="{{ asset('images/amex_logo.png') }}" width="80px" alt="">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger btn-lg">
                                    Pagar <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
