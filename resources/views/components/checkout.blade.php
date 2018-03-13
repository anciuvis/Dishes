@if(Auth::guest() && $cartTotal != 0)
	<div class="row">
		<a href="{{ route('login') }}" class="btn btn-lg btn-success btn-block">Checkout</a>
	</div>
@elseif($cartTotal == 0)
	<div class="row">
		<a href="{{ route('dish.index') }}" class="btn btn-lg btn-success btn-block">Add something</a>
	</div>
@else
	<div class="row">
		<form class="form-horizontal" method="POST" action="{{ route('orders.store') }}">
			{{ csrf_field() }}
			<button class="btn btn-lg btn-success btn-block">Checkout</button>
		</form>
	</div>
@endif
