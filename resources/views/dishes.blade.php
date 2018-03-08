@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
	<body>
		<div class="container">
			@component('components/create', [
				'name'	=> 'Create Dish',
				'route'		=> 'dishes.create'
			])
			@endcomponent
			<section>
				<div class="row justify-content-center ml-0">
						@foreach($dishes as $dish)
										@component('components/card', [
										'dish'		=> $dish,
										'single' 	=> FALSE,
										])
										@endcomponent
						@endforeach
				</div>
			</section>
		</div>
	</body>
@endsection
