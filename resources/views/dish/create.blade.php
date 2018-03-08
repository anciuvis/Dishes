@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, taskas lygu slashui -->
@section('content')
	<body>
		<div class="container w-75">
			<div class="mb-3">
				<a href="{{ route('dishes') }}"><button class="btn btn-warning">Back</button></a>
			</div>
			<h2 class="text-center">Create Dish form</h2>
			<form action="{{ route('dishes.store') }}" method="POST" class="needs-validation">
				@csrf
				<div class="form-group">
					<label class="px-3" for="title">Title: </label>
					<input name="title" type="text" class="form-control px-3 @if($errors->has('title')) is-invalid @endif" id="title" placeholder="Enter title" value="{{ old('title') }}">
					@if($errors->has('title'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('title') }}
					</div>
					@endif

				</div>
				<div class="form-group">
					<label class="px-3" for="image_url">Dish Image: </label>
					<input name="image_url" type="text" class="form-control px-3 @if($errors->has('image_url')) is-invalid @endif" id="image_url" placeholder="Enter image source" value="{{ old('image_url') }}">
					@if($errors->has('image_url'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('image_url') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label class="px-3" for="price">Price: </label>
					<input name="price" type="number" step="0.01" class="form-control px-3 @if($errors->has('price')) is-invalid @endif" id="price" placeholder="Price"  value="{{ old('price') }}">
					@if($errors->has('price'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('price') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label class="px-3" for="description">Description</label>
					<textarea name="description" class="form-control @if($errors->has('description')) is-invalid @endif" id="description" rows="3" placeholder="Description">{{ old('description') }}</textarea>
					@if($errors->has('description'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('description') }}
					</div>
					@endif
				</div>
				<button type="submit" class="btn btn-primary">Create Dish</button>
			</form>
		</div>
	</body>
@endsection
