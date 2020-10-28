@extends('layouts.frontend')

@section('content')
    <!--================ Menu Area =================-->
    <section class="menu_area section_gap">
        <div class="container">
            <div class="row menu_inner">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist" align="center">
                        @foreach ($types as $key => $type)
                            <li class="nav-item">
                                <a class="nav-link {{$key == 0 ? 'active' : ''}}" 
                                    id="home-tab" 
                                    data-toggle="tab"
                                    href="#data{{$type->id}}"
                                    role="tab">{{$type->type_name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach ($types as $key => $type)
                            <div class="tab-pane fade show {{$key == 0 ? 'active' : ''}}" id="data{{$type->id}}" role="tabpanel">
                                <br>
                                <div class="row justify-content-center">
                                    @foreach ($type->categoryTypes as $index => $category)
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
                                    @endforeach
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--================End Menu Area =================-->
@endsection
