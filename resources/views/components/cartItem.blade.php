<ul class="list-group mb-3">
	<li class="list-group-item list-group-item-success">
		{{ $item->dish->title }}
	</li>
	<li class="list-group-item d-flex">
		<div class="col-md-3">
			<a href="{{ route('dishes.show', $item->dish->id) }}">
				<img class="img-responsive" src="{{-- $item->dish->image_url --}}">
			</a>
		</div>
		<div class="col-md-6">
			{{ str_limit($item->dish->description, 100) }}
			<br>
			Price: <span class="badge badge-success">{{ $item->dish->price }} $</span>
		</div>
		<div class="col-md-3">
			{{-- $item->id --}}
			@component('components/delete', [
				'id' 		=> $item->id,
				'name'	=> 'Delete from cart',
				'route'		=> 'carts.destroy',
				'users'  => ['admin', 'user'],
				''
			])
			@endcomponent
		</div>
	</li>
</ul>
