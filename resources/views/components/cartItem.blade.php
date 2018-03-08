<ul class="list-group mb-3">

	<li class="list-group-item list-group-item-success">
		{{ $item->dish_id }}
	</li>
	<li class="list-group-item d-flex">
		<div class="col-md-3">
			<a href="{{ $item->dish_id }}">
				<img class="img-responsive" src="{{ $item->dish_id }}">
			</a>
		</div>
		<div class="col-md-6">
			{{ $item->dish_id }}
			<br>
			Price: <span class="badge badge-success">{{ $item->dish_id }} $</span>
		</div>
		<div class="col-md-3">
			<form method="POST" action="">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="_token" value="vrGU1xE9aGRtKlHJpAqmrD2DDH0EGlLkQCX7l6eS">
				<button class="btn btn-danger">Delete from cart</button>
			</form>
		</div>
	</li>
</ul>
