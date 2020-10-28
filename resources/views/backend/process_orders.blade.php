@extends('layouts.frontend')

@section('content')
    <section class="menu_area section_gap">
        <div class="container">
            <div class="row menu_inner">
                <div class="col-lg-12">
                    <h1>Ordenes Procesadas</h1><hr>
                    <ul class="nav nav-tabs" id="myTab" role="tablist" align="center">
                        <li class="nav-item">
                            <a class="nav-link active" 
                                id="home-tab" 
                                data-toggle="tab"
                                href="#mesas"
                                role="tab">Mesas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" 
                                id="home-tab" 
                                data-toggle="tab"
                                href="#pedidos"
                                role="tab">Pedidos
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="mesas" role="tabpanel">
                            <br>
                            @include('backend.partitials.tables',['orders' => $orders])
                        </div>
                        <div class="tab-pane fade show" id="pedidos" role="tabpanel">
                            <br>
                            @include('backend.partitials.tables',['orders' => $deliveries])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
