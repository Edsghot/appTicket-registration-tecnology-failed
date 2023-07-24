@extends('template.layout')
@section('titleGeneral', 'Lista de ciudades...')
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
					<button class="btn btn-xs btn-default" onclick="deleteCity('{{$value->idCity}}');">Eliminar</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('js')
<script src="{{asset('viewresources/teacher/getall.js')}}"></script>
@endsection