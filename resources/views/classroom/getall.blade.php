@extends('template.layout')
@section('titleGeneral', 'getall Ticket...')
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

