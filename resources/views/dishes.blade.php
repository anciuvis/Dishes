@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
	<body>
		<div class="container">
			<div class="mb-3">
			</div>
			<section>
				<div class="row justify-content-center">
						@foreach($dishes as $dish)
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
										@component('components/card', ['dish'=>$dish, 'admin' => FALSE])
										@endcomponent
							</div>
						@endforeach
				</div>
			</section>
		</div>
	</body>
@endsection
