@extends('layouts.app')
@section('content')
	<div class="container w-75">
		@component('components/create', [
			'name'	=> 'Create new reservation',
			'route'		=> 'reservations.create'
		])
		@endcomponent

		rezervaciju vieta

	</div>
@endsection
