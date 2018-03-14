@extends('layouts.app')
@section('content')
	<body>
		<div class="container">
				<h1>Cart - {{ Cart::count() }} item(s)</h1>
					@component('components/checkout', [
						'cartTotal' => Cart::total(),
						'cart'      => $cart,
					])
					@endcomponent
		</div>
	</body>
@endsection
