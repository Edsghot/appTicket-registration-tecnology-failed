@extends('template.layout')

@section('titleGeneral', 'registrar ticket')
@section('roles')
	<div class="info">
		<a href="../../ticket/insert" class="d-block">DOCENTE</a>
	</div>
@endsection
s
@section('listaRutas')
	@section('title')
	<p>
		Principal
		<i class="right fas fa-angle-left"></i>
	</p>
	@endsection
	@section('rutas')
	<a href="{{ url('ticket/getby/' . $idTeacher) }}" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>registrar ticket</p>
	</a>
	<a href="{{ url('ticket/insert/' . $idTeacher) }}" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>registrar ticket</p>
	</a>
	@endsection
@endsection
@section('sectionGeneral')
<form id="frmTicketInsert" action="{{ url('ticket/insert/' . $idTeacher) }}" method="post">
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
				<option value='{{$classroom->idClassroom}}'>{{$classroom->name}}</option>
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
