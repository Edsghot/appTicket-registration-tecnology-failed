@extends('template.layout')
@section('titleGeneral', 'Lista de ticket')
@section('roles')
	<div class="info">
		<a href="../admin/getall" class="d-block">ADMINISTRADOR</a>
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
	<a href="../admin/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>Lista de administrador</p>
	</a>
	<a href="../admin/insert" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>insertar Administrador</p>
	</a>

	<a href="../classroom/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>Salones</p>
	</a>

	<a href="../teacher/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>Docentes</p>
	</a>

	<a href="../ticket/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>Ticket</p>
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
					<button class="btn btn-xs btn-default" onclick="updateStatusTicket('{{$ticket->idTicket}}');">aceptar</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('js')
<script src="{{asset('viewresources/ticket/getall.js')}}"></script>
@endsection

