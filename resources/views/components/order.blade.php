<tr>
	<th scope="row">{{ $order->id }}</th>
	<td>
		<ul>
			@foreach($order->carts as $cart)
				<li>
					<small>
						<a href="{{ route('dishes.show', $cart->dish->id) }}">{{ $cart->dish->title }}</a>
					</small>
				</li>
			@endforeach
		</ul>
	</td>
	<td>
		{{ $order->user->name }}
	</td>
	<td>
		{{ $order->user->address }}
	</td>
	<td>
		{{ $order->total_amount }}
	</td>
	<td>
		{{ $order->tax_amount }}
	</td>
	<td>
		{{ $order->created_at }}
	</td>
	<td>
		@component('components/delete', [
			'id' 		=> $order->id,
			'name'	=> 'Delete Order',
			'route'		=> 'orders.destroy',
			'users'  => ['admin']
		])
		@endcomponent
	</td>
</tr>
