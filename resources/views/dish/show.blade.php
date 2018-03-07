@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
	<body>
		<div class="container">
			<div class="mb-3">
				<a href="{{ route('dishes') }}"><button class="btn btn-danger">Back</button></a>
			</div>
			<section>
				<div class="row justify-content-center">
						@component('components/card', ['dish'=>$dish, 'single' => TRUE])
						@endcomponent
				</div>
			</section>
		</div>
	</body>
@endsection
