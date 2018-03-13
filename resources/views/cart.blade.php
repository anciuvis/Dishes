@extends('layouts.app')
@section('content')
	<body>
		<div class="container">
				<h1>Cart - {{ Cart::count() }} item(s)</h1>
					@foreach($cart as $item)
						@component('components/cartItem', [
						'item'		=> $item,
						])
						@endcomponent
					@endforeach
					<div>
						<h2 class="d-flex justify-content-between">Sub-total: <p class="badge badge-primary pull-right">{{ Cart::total()-Cart::vat() }} $</p></h2>
					</div>
					<div class="">
						<h2 class="d-flex justify-content-between">VAT: <p class="badge badge-info">{{ Cart::vat() }} $</p></h2>
					</div>
					<div class="">
						<h2  class="d-flex justify-content-between">Total: <p class="badge badge-success">{{ Cart::total() }} $</p></h2>
					</div>
					@component('components/checkout', [
						'cartTotal' => Cart::total()
					])
					@endcomponent
		</div>
	</body>
@endsection
