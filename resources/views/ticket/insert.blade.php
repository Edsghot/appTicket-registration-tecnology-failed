@extends('template.layout')
@section('titleGeneral', 'Registrar ciudad...')
@section('sectionGeneral')
<form id="frmTicketlogin" action="{{url('ticket/insert')}}" method="post">
	@csrf <!-- Este es el campo del token CSRF -->
	<div class="row">
		<div class="col-md-12 form-group">
			<label for="txtCode">Código</label>
			<input type="text" id="txtCode" name="txtCode" class="form-control">
			<label for="txtTitle">Título</label>
			<input type="text" id="txtTitle" name="txtTitle" class="form-control">
			<label for="txtDetails">Detalles</label>
			<textarea id="txtDetails" name="txtDetails" class="form-control"></textarea>
			<label for="txtTeacherID">ID del Profesor</label>
			<input type="text" id="txtTeacherID" name="txtTeacherID" class="form-control">
			<label for="txtDate">Fecha</label>
			<input type="date" id="txtDate" name="txtDate" class="form-control">
			<label for="txtStatus">Estado</label>
			<select id="txtStatus" name="txtStatus" class="form-control">
				<option value="1">Activo</option>
				<option value="0">Inactivo</option>
			</select>
			<label for="txtSchoolID">ID de la Escuela</label>
			<input type="text" id="txtSchoolID" name="txtSchoolID" class="form-control">
			<label for="txtPassword">Contraseña</label>
			<input type="password" id="txtPassword" name="txtPassword" class="form-control">
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-primary" onclick="sendFrmTicketlogin();">Registrar datos</button>
		</div>
	</div>
</form>
@endsection
@section('js')
<script src="{{asset('viewresources/ticket/insert.js')}}"></script>
@endsection
