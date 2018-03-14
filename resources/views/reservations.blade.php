@extends('layouts.app')
@section('content')
	<div class="container w-75">
		<h1>Reservations ({{ count($reservations) }})</h1>

		@component('components/create', [
			'name'	=> 'Create new reservation',
			'route'		=> 'reservations.create',
			'users'  => ['admin', 'user']
		])
		@endcomponent

		<div class="panel panel-default">
			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>People amount</th>
						<th>Reserved</th>
						<th>Created</th>
						<th>Phone</th>
						@if(Auth::check() && Auth::user()->role == 'admin')
						<th>Action</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach($reservations as $reservation)
					@component('components/reservation', [
					'reservation'		=> $reservation,
					])
					@endcomponent
					@endforeach
				</tbody>
			</table>
		</div>

	</div>
@endsection
