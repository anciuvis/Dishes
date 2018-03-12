<ul class="list-group mb-3">

	<li class="list-group-item list-group-item-success">
		{{ $item->dish_id }}
	</li>
	<li class="list-group-item d-flex">
		<div class="col-md-3">
			<a href="#">
				<img class="img-responsive" src="{{ $item->dish->image_url }}">
			</a>
		</div>
		<div class="col-md-6">
			{{ $item->dish->title }}
			<br>
			Price: <span class="badge badge-success">{{ $item->dish->price }} $</span>
		</div>
		<div class="col-md-3">
			{{-- $item->id --}}
			@component('components/delete', [
				'id' 		=> $item->id,
				'name'	=> 'Delete from cart',
				'route'		=> 'carts.destroy'
			])
			@endcomponent
		</div>
	</li>
</ul>
