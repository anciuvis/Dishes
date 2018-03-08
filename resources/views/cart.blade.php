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
						<h2 class="d-flex justify-content-between">Sub-total: <p class="badge badge-primary pull-right">{{ number_format($item->dish_id, 2) }} $</p></h2>
					</div>
					<div class="">
						<h2 class="d-flex justify-content-between">VAT: <p class="badge badge-info">{{ number_format($item->dish_id, 2) }} $</p></h2>
					</div>
					<div class="">
						<h2  class="d-flex justify-content-between">Total: <p class="badge badge-success">{{ number_format($item->dish_id, 2) }} $</p></h2>
					</div>
					@component('components/create', [
						'name'	=> 'Create order',
						'route'		=> 'orders.create'
					])
					@endcomponent
		</div>
	</body>
@endsection
