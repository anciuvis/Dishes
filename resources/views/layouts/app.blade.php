<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dishes project') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Homepage') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
											<li class="nav-item">
												<a class="nav-link" href="{{ url('/contact') }}">
													Contacts
												</a>
											</li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
														<li><a class="nav-link" href="{{ route('reservations.index') }}">Reservations</a></li>
														<li><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
														<li id="cart" class="nav-item">
															<a class="nav-link" href="{{ route('carts.index') }}">
																Cart (<span class="cart-size">{{ Cart::count() }}</span>) - <span class="cart-total">{{ Cart::total() }}</span> $
															</a>
															<!-- reikia kviesti count() su skliaustais - nes metodas -->
															<!-- galim kviesti visuose vietuose -->
															{{-- csrf_token() --}}
															<!-- patikrinimui galima matyt visad tokena dabartini: -->
															<!-- cia kad rodytu tokena savo jei norim perziureti koks jis yra -->
														</li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
		<script type="text/javascript">

			// DOMContentLoaded
			$(document).ready(function() {
				// alert('Document ready');

				// uzdedam Submit ivyki ant formos. eevent
				$('.js-cart-form').on('submit', function(e) {
					// alert('onsubmit ivyko');
					e.preventDefault();

					// console.log($(this).attr('action')); // paima 'sitos' formos atributa 'action';

					// console.log($(this).serialize()); // paima 'sitos' formos elementu reiksmes. paima serializuota eilute su jquery is formos

					// ajax uzklausa
					$.ajax({
						method: "POST",
						url: $(this).attr('action'),
						data: $(this).serialize(), // dinaminis sprendimas
						success: function( data ) {
							// alert( "Data Saved: " + data );
							let parsedData = $.parseJSON(data),
									cartSize = parseFloat($('#cart .cart-size').text()), // converts string to number
									cartTotal = parseFloat($('#cart .cart-total').text()); // converts string to number
									// cartTotal = parseFloat($('#cart .cart-total').text().replace(',', ''));

							cartSize++;
							cartTotal += parsedData.dish.price;
							$('#cart .cart-size').text(cartSize); // Changes the text for cart-size
							$('#cart .cart-total').text(cartTotal.toFixed(2)); // suapvalins iki 2 po kablelio,konvertuos i stringa
							// $('#cart .cart-total').text(cartTotal.toLocaleString('en-GB', { minimumFractionDigits: 2 }));

							let alert = $('<div class="alert alert-warning" style="position:fixed; width:90%; left:0; right:0; z-index: 5; margin: 0 auto; top: 50px;" role="alert">');
								alert.html('Succesfully added one <strong>' + parsedData.dish.title + "</strong>, which price is " + parsedData.dish.price + '$');
								alert.hide();
							$('body .alert').fadeOut();
							$('body').prepend(alert.fadeIn());

							// console.log(cartSize);
							// console.log(cartTotal);
							// console.log(parsedData.dish.price);
						},
						error: function( msg ) {
							alert( "Data Saved: " + msg );
						},
						done: function( msg ) {
							alert( "Data Saved: " + msg );
						}
					});

			});
		});
		</script>
</body>
</html>
