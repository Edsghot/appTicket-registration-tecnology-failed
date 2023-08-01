@extends('template.layout')
@section('titleGeneral', 'Lista de ticket')
@section('roles')
	<div class="info">
		<a href="#" class="d-block">ADMINISTRADOR</a>
	</div>
@endsection

@section('listDashboard')
<li class="nav-item">
	<a href="../admin/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
			<p>lista de administrador</p>
	</a>
</li>

<li class="nav-item">
	<a href="../ticket/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
			<p>verificar ticket</p>
	</a>
</li>


<li class="nav-item">
	<a href="../ticket/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
			<p>Eliminar ticket</p>
	</a>
</li>

<li class="nav-item">
	<a href="../ticket/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
			<p>todos los ticket</p>
	</a>
</li>
<li class="nav-item">
	<a href="../teacher/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
			<p>Docentes</p>
	</a>
</li>
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

