@extends('template.layout')
@section('titleGeneral', 'Salones')

@section('roles')
	<div class="info">
		<a href="../admin/getall" class="d-block">ADMINISTRADOR</a>
	</div>
@endsection

@section('listaRutas')
	@section('title')
	<p>
		Salones
		<i class="right fas fa-angle-left"></i>
	</p>
	@endsection
	@section('rutas')
	<a href="../classroom/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>Lista de salones</p>
	</a>
	<a href="../classroom/insert" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>insertar salones</p>
@section('listaRutas')
	@section('title')
	<p>
		Docentes
		<i class="right fas fa-angle-left"></i>
	</p>
	@endsection
	@section('rutas')
	<a href="../teacher/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>Lista de docentes</p>
	</a>
	<a href="../teacher/insert" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>insertar docentes</p>
	</a>
	@endsection
@endsection
	</a>
	@endsection
@endsection

@section('sectionGeneral')
<table class="table table-striped">
	<thead>
		<tr>
			<th>id Ticket</th>
			<th>codigo</th>
			<th>Nombre</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($listClassroom as $classroom)
			<tr>
				<td>{{$classroom->idClassroom}}</td>
				<td>{{$classroom->code}}</td>
				<td>{{$classroom->name}}</td>
				<td class="text-right">
					<button class="btn btn-xs btn-default" onclick="deleteClassroom('{{$classroom->idClassroom}}');">Eliminar</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('js')
<script src="{{asset('viewresources/classroom/getall.js')}}"></script>
@endsection

