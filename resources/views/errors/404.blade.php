@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-md-12">
				<h1>Sorry, the page does not exist! (error 404)</h1>
			</div>
			<div class="col-md-12">
				<a href="{{ route('home') }}" class="btn btn-danger btn-lg">Go back to homepage</a>
			</div>
		</div>
	</div>
@endsection
