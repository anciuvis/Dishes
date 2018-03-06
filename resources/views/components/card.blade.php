<ul class="list-group col-md-4">
	<li class="list-group-item list-group-item-success">{{ $dish->title }}</li>
		<li class="list-group-item">
			<img src="{{ $dish->image_url }}" class="mx-auto img-responsive w-100 my-1" alt="picture"/>
		</div>
		<h2 class="card-text text-left"></h2>
		<p class="card-text text-left px-2 py-1">Price:
			<span class="d-block badge badge-pill badge-success px-2 py-1">{{ $dish->price }}</span>
		</p>
		<p class="card-text text-left px-2 py-1">
			{{ str_limit($dish->description, 50) }}
		</p>
		<div class="btn-group" role="group">
			@if($admin == FALSE)
			<a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-primary" name="read">Read more</a>
			@else
			@auth
			<a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-success" name="edit">Edit</a>
			<form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<button class="btn btn-warning" name="delete">Delete</button>
			</form>
			@endif
			@endif
		</div>
	</div>
</article>
