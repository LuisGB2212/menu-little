<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Restaurant - Menu Light</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/vendors/lightbox/simpleLightbox.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/vendors/jquery-ui/jquery-ui.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/vendors/animate-css/animate.css')}}">
	<!-- main css -->
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>

<body>

	<!--================ Start Header Menu Area =================-->
	<div class="menu-trigger" align="right">
		<i class="badge badge-primary totalProduct">{{Cart::count()}}</i>
		<span></span>
		<span></span>
		<span></span>
	</div>
	
	<header class="fixed-menu">
        <span class="menu-close"><i class="fa fa-times"></i></span>
        <div class="menu-header">
            <div class="logo d-flex justify-content-center">
			<h4>{{ env('APP_NAME')}}</h4>
            </div>
        </div>
        <div class="nav-wraper">
            <div class="navbar">
                <ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
							<img src="{{ asset('images/nav-icon3.png') }}" alt=""> Menú
						</a>
					</li>
					@guest
						<li class="nav-item">
							<a class="nav-link {{ Request::is('orders') ? 'active' : '' }}" href="{{ url('orders') }}">
								<img src="{{ asset('images/nav-icon7.png') }}" alt="">Orden
								(<strong class="totalProduct">{{Cart::count()}}</strong>)
							</a>
						</li>
						<li class="nav-item">
							@php
								$orderList = null;
								if(Request()->session()->has('order')){
									$orderList = Request()->session()->get('order')['number_order'];
								}
							@endphp
							<a class="nav-link {{ Request::is('check-out/'.$orderList) ? 'active' : '' }}" href="{{ url('check-out/'.$orderList) }}">
								<img src="{{ asset('images/nav-icon7.png') }}" alt="">Pagar
							</a>
						</li>
					@endguest
					
					@auth
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/pending/orders') ? 'active' : '' }}" href="{{ url('admin/pending/orders') }}">
								<img src="{{ asset('images/nav-icon7.png') }}" alt="">Ordenes Pendientes
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/process/orders') ? 'active' : '' }}" href="{{ url('admin/process/orders') }}">
								<img src="{{ asset('images/nav-icon7.png') }}" alt="">Ordenes Procesados
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}"
										onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
								<img src="{{ asset('images/salida.png') }}" alt="">{{ __('Cerrar sesión') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">
								<img src="{{ asset('images/login.png') }}" alt="">Iniciar sesion
							</a>
						</li>
					@endauth
                </ul>
            </div>
        </div>
    </header>
	<div class="site-main">
		@yield('content')
	</div>
	<div class="modal fade" id="addProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Agregar Producto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/" id="addProductToCar">
					<div class="modal-body">
						@csrf
						<div class="form-group " id="informationProduct">

						</div>
						<div class="form-group">
							<input type="number" min="1" class="form-control" name="quantity" placeholder="Cantidad" value="1">
						</div>
						<div class="form-group">
							<textarea name="description_more" id="" cols="20" class="form-control" placeholder="Descripción adicional"></textarea>
						</div>
						<input type="hidden" name="drink_food_id" id="modalDrink_food_id">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Agregar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="infoOrder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Información de Orden</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-lg-12" id="informationOrderData">

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="orderPayment" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Cobrar Orden</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/" id="orderToPay">
					@csrf
					<div class="modal-body">
						<div class="col-lg-12">
							<label for="">Monto a cobrar</label>
							<h3 id="montToPay"></h3>
							<hr>
							<input type="number" class="form-control" name="montPay" required placeholder="Monto recibido">
						</div>
					</div>
					<input type="hidden" name="order_id" id="order_id_pay" value="">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Cobrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	 <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script> 
	<script src="{{ asset('frontend/js/popper.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	{{--  <script src="{{ asset('frontend/js/stellar.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('frontend/vendors/lightbox/simpleLightbox.min.js') }}"></script>
	<script src="{{ asset('frontend/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/vendors/jquery-ui/jquery-ui.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('frontend/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('frontend/vendors/counter-up/jquery.counterup.js') }}"></script>
	<script src="{{ asset('frontend/js/mail-script.js') }}"></script>  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.8.1/sweetalert2.all.js"></script>
	
	<script src="{{ asset('js/custom.js') }}"></script> 
	<script src="{{ asset('js/custom_back.js') }}"></script> 
	<script src="{{ asset('frontend/js/theme.js') }}"></script>
	@yield('scripts')
</body>

</html>