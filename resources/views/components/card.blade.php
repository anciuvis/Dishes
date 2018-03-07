<ul class="list-group col-md-12 col-lg-4">
	<li class="list-group-item list-group-item-success">{{ $dish->title }}</li>
		<li class="list-group-item">
			<a href="#">
				<img src="{{ $dish->image_url }}" class="mx-auto img-responsive w-100 my-1" alt="picture"/>
			</a>
		</li>
		<li class="list-group-item height-fix">{{ str_limit($dish->description, 50) }}</li>
		<li class="list-group-item">Price: {{ $dish->price }} $</li>
			<a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-info btn-block" name="read">Read more</a>
</ul>
