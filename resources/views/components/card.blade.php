<ul class="list-group col-md-12 col-lg-4 mb-3">
	<li class="list-group-item list-group-item-success">{{ $dish->title }}</li>
	<li class="list-group-item">
		<a href="@if ($single){{'#'}}@else{{ route('dishes.show', $dish->id) }}@endif">
			<img src="@if ($single){{'../'}}@endif{{ $dish->image_url }}" class="mx-auto img-responsive w-100 my-1" alt="picture"/>
		</a>
	</li>
	<li class="list-group-item" style="height: 90px;">
		@if ($single) {{ $dish->description }} @else {{ str_limit($dish->description, 90) }} @endif
	</li>
	<li class="list-group-item">Price: {{ $dish->price }} $</li>
	<form method="POST" action="{{ route('carts.store') }}" class="js-cart-form">
    {{ csrf_field() }}
    <input
    	type="hidden"
    	name="dish_id"
    	value="{{ $dish->id }}">
    <button class=" btn btn-dark btn-block mb-1">Add to cart</button>
	</form>
	@component('components/edit', [
		'id' 		=> $dish->id,
		'name'	=> 'Edit Dish',
		'route'		=> 'dishes.edit',
		'users'  => ['admin']
	])
	@endcomponent
	@component('components/delete', [
		'id' 		=> $dish->id,
		'name'	=> 'Delete Dish',
		'route'		=> 'dishes.destroy',
		'users'  => ['admin']
	])
	@endcomponent
</ul>
