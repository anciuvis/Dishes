<ul class="list-group col-md-12 col-lg-4 mb-3">
	<li class="list-group-item list-group-item-success">{{ $dish->title }}</li>
		<li class="list-group-item">
			<a href="@if ($single){{'#'}}@else{{ route('dishes.show', $dish->id) }}@endif">
				<img src="@if ($single){{'../'}}@endif{{ $dish->image_url }}" class="mx-auto img-responsive w-100 my-1" alt="picture"/>
			</a>
		</li>
		<li class="list-group-item height-fix">
			@if ($single) {{ $dish->description }} @else {{ str_limit($dish->description, 90) }} @endif
		</li>
		<li class="list-group-item">Price: {{ $dish->price }} $</li>
		<form method="POST" action="">
			<a href="#" class="js-add-to-cart btn btn-info btn-block" name="read">Add to cart</a>
		</form>
		@component('components/delete', [
			'id' 		=> $dish->id,
			'name'	=> $name,
			'route' => $route
		])
		@endcomponent
</ul>
