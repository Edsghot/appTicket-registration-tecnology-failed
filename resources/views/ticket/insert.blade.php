@extends('template.layout')
@section('titleGeneral', 'Registrar ticket...')
@section('sectionGeneral')
<form id="frmTicketInsert" action="{{url('ticket/insert')}}" method="post">
	@csrf <!-- Este es el campo del token CSRF -->
	<div class="row">
		<div class="col-md-12 form-group">

			<label for="txtTitle">Título</label>
			<input type="text" id="txtTitle" name="txtTitle" class="form-control">

			<label for="txtDetails">Detalles</label>
			<textarea id="txtDetails" name="txtDetails" class="form-control"></textarea>

			<label for="txtNameClassroom">Nro Salon</label>
			<select id="txtNameClassroom" name="txtNameClassroom" class="form-control">
			@foreach($listTClassroom as $classroom)
				<option value='{{$classroom->name}}'>{{$classroom->name}}</option>
			@endforeach
			</select>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-primary" onclick="sendFrmTicketInsert();">Registrar datos</button>
		</div>
	</div>
</form>
@endsection
@section('js')
<script src="{{asset('viewresources/ticket/insert.js')}}"></script>
@endsection
