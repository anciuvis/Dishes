@if(Auth::guest() && $cartTotal != 0)
	<div class="row">
		<a href="{{ route('login') }}" class="btn btn-lg btn-success btn-block">Checkout</a>
	</div>
@elseif($cartTotal == 0)
	<div class="row">
		<h2>Your cart is empty :(</h2>
		<a href="{{ route('dishes') }}" class="btn btn-lg btn-success btn-block">Add something to cart!</a>
	</div>
@else
		@foreach($cart as $item)
			@component('components/cartItem', [
			'item'		=> $item,
			])
			@endcomponent
		@endforeach
		<h2 class="d-flex justify-content-between">Sub-total: <p class="badge badge-primary pull-right">{{ Cart::total()-Cart::vat() }} $</p></h2>
		<div class="">
			<h2 class="d-flex justify-content-between">VAT: <p class="badge badge-info">{{ Cart::vat() }} $</p></h2>
		</div>
		<div class="">
			<h2  class="d-flex justify-content-between">Total: <p class="badge badge-success">{{ Cart::total() }} $</p></h2>
		</div>
		<form class="form-horizontal" method="POST" action="{{ route('orders.store') }}">
			{{ csrf_field() }}
			<button class="btn btn-lg btn-success btn-block">Checkout</button>
		</form>
	</div>
@endif
