@extends('template.layout')
@section('titleGeneral', 'getall Ticket...')
@section('sectionGeneral')
<table class="table table-striped">
	<thead>
		<tr>
			<th>id Ticket</th>
			<th>codigo</th>
			<th>titulo</th>
			<th>detalles</th>
			<th>id Profesor</th>
			<th>fecha</th>
			<th>estado</th>
			<th>id Escuela</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($listTicket as $ticket)
			<tr>
				<td>{{$ticket->idTicket}}</td>
				<td>{{$ticket->code}}</td>
				<td>{{$ticket->title}}</td>
				<td>{{$ticket->details}}</td>
				<td>{{$ticket->teacher_id}}</td>
				<td>{{$ticket->date}}</td>
				<td>{{$ticket->status ? 'Activo' : 'Inactivo'}}</td>
				<td>{{$ticket->school_id}}</td>
				<td class="text-right">
					<button class="btn btn-xs btn-default" onclick="deleteTicket('{{$ticket->idTicket}}');">Eliminar</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('js')
<script src="{{asset('viewresources/ticket/getall.js')}}"></script>
@endsection

