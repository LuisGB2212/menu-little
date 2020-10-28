@extends('layouts.frontend')

@section('content')
    <section class="menu_area section_gap">
        <div class="container">
            <div class="row menu_inner">
                <div class="col-lg-12">
                    <h1>Las Ordenes</h1><hr>
                    <form action="" id="orderProducts">
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
                                @foreach (Cart::content() as $item)
                                    <tr id="item{{$item->id}}">
                                        <td>
                                            <strong>{{$item->name}}</strong>
                                            <br>{{$item->options->details != null ? '('.$item->options->details.')' : '' }}
                                        </td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->total}}</td>
                                        <td>
                                            <button class="btn btn-danger deleteItem" idItem="{{$item->id}}" idProduct="{{$item->rowId}}">
                                                <i class="fa fa-times"></i>
                                            </button>    
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                        <div class="col-lg-12 row" id="tableFooterOrder">
                            @csrf
                            <div class="col-lg-10">
                                @if (!Request()->session()->has('table') && Cart::count() > 0)
                                    @php
                                        $typeOrders = \App\TypeOrder::all();
                                    @endphp
                                    <div class="col-lg-12 row form-group" align="center">
                                        <div class="col-lg-12">
                                            <h4>No se encuentra en el local, para su pedido sera?</h4>
                                        </div>
                                        @php
                                            $idType = 0;
                                            $checkTypeOrder = null;
                                            if(Request()->session()->has('order')){
                                                $idType = Request()->session()->get('order')['type_order_id'];
                                                $checkTypeOrder = $typeOrders->where('id',$idType)->first();
                                            }
                                        @endphp
                                        
                                        @if ($checkTypeOrder != null)
                                            <div class="col-lg-12">
                                                <strong>Su orden se agregara al anterior, ya que no ha realizado el pagado</strong>
                                                <br>Modalidad: {{$checkTypeOrder->name}}
                                            </div>
                                        @else
                                            @foreach ($typeOrders as $typeOrder)
                                                <div class="col-lg-4">
                                                    <input type="radio" required class="" name="typeOrderId" value="{{$typeOrder->id}}">{{$typeOrder->name}}
                                                </div>
                                            @endforeach
                                        @endif
                                        @include('frontend.informationUser')
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-danger btn-lg ">
                                    Ordenar <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>        
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
@endsection
