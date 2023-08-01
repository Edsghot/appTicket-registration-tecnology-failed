@extends('template.layout')
@section('titleGeneral', 'Lista de ciudades...')


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