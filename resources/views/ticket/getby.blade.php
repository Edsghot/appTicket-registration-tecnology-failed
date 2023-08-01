@extends('template.layout')
@section('titleGeneral', 'lista ticket')
@section('roles')
	<div class="info">
		<a href="../../ticket/insert" class="d-block">DOCENTE</a>
	</div>
@endsection

@section('listaRutas')
	@section('title')
	<p>
		Principal
		<i class="right fas fa-angle-left"></i>
	</p>
	@endsection
	@section('rutas')
	
	<a href="{{ url('ticket/getby/' . $idTeacher) }}" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>mis Ticket</p>
	</a>
	<a href="{{ url('ticket/insert/' . $idTeacher) }}" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>registrar ticket</p>
	</a>
	@endsection
@endsection
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
			<th>id Salon</th>
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
				<td>{{$ticket->idClassroom}}</td>
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
