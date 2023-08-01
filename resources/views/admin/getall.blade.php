@extends('template.layout')
@section('titleGeneral', 'Administradores')
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
			<th>idAdmin</th>
			<th>codigo</th>
			<th>nombre</th>
			<th>apellidos</th>
			<th>fecha nacimiento</th>
			<th>ocupacion</th>
			<th>password</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($listAdmin as $value)
			<tr>
				<td>{{$value->idAdmin}}</td>
				<td>{{$value->code}}</td>
				<td>{{$value->first_name}}</td>
				<td>{{$value->last_name}}</td>
				<td>{{$value->birth_date}}</td>
				<td>{{$value->occupation}}</td>
				<td>{{$value->password}}</td>
				<td class="text-right">
					<button class="btn btn-xs btn-default" onclick="deleteAdmin('{{$value->idAdmin}}');">Eliminar</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('js')
<script src="{{asset('viewresources/admin/getall.js')}}"></script>
@endsection