@extends('template.layout')
@section('titleGeneral', 'Lista de ciudades...')
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