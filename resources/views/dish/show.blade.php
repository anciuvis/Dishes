@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
	<body>
		<div class="container">
			<div class="mb-3">
				<a href="{{ route('dishes') }}"><button class="btn btn-danger">Back</button></a>
			</div>
			<section>
				<div class="row justify-content-center">
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						@component('components/card', ['dish'=>$dish, 'admin' => TRUE])
						@endcomponent
					</div>
				</div>
			</section>
		</div>
	</body>
@endsection
