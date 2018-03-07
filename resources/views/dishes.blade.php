@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
	<body>
		<div class="container">
			<section>
				<div class="row justify-content-center">
						@foreach($dishes as $dish)
										@component('components/card', ['dish'=>$dish, 'admin' => FALSE])
										@endcomponent
						@endforeach
				</div>
			</section>
		</div>
	</body>
@endsection
