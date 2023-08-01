@extends('template.layout')
@section('titleGeneral', 'Docentes...')
@section('roles')
	<div class="info">
		<a href="../teacher/getall" class="d-block">ADMINISTRADOR</a>
	</div>
@endsection

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
@section('sectionGeneral')
<table class="table table-striped">
	<thead>
		<tr>
			<th>idTeacher</th>
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
		@foreach($listTeacher as $value)
			<tr>
				<td>{{$value->idTeacher}}</td>
				<td>{{$value->code}}</td>
				<td>{{$value->first_name}}</td>
				<td>{{$value->last_name}}</td>
				<td>{{$value->birth_date}}</td>
				<td>{{$value->occupation}}</td>
				<td>{{$value->password}}</td>
				<td class="text-right">
					<button class="btn btn-xs btn-default" onclick="deleteTeacher('{{$value->idTeacher}}');">Eliminar</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('js')
<script src="{{asset('viewresources/teacher/getall.js')}}"></script>
@endsection