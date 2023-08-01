@extends('template.layout')
@section('roles')
	<div class="info">
		<a href="../admin/getall" class="d-block">ADMINISTRADOR</a>
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
<form id="frmTeacherInsert" action="{{url('teacher/insert')}}" method="post">
	@csrf <!-- Este es el campo del token CSRF -->
	<div class="row">
		<div class="col-md-12 form-group">
			<label for="txtCode">Codigo</label>
            <input type="text" id="txtCode" name="txtCode" class="form-control">
            <label for="txtFirstName">nombre</label>
			<input type="text" id="txtFirstName" name="txtFirstName" class="form-control">
			<label for="txtLastName">apellidos</label>
			<input type="text" id="txtLastName" name="txtLastName" class="form-control">
			<label for="birthDate">fecha de nacimiento</label>
			<input type="date" id="birthDate" name="birthDate" class="form-control">
			<label for="txtOccupation">ocupacion</label>
			<input type="text" id="txtOccupation" name="txtOccupation" class="form-control">
			<label for="txtPassword">Password</label>
			<input type="text" id="txtPassword" name="txtPassword" class="form-control">
        
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-primary" onclick="sendFrmTeacherInsert();">Registrar datos</button>
		</div>
	</div>
</form>
@endsection
@section('js')
<script src="{{asset('viewresources/teacher/insert.js')}}"></script>
@endsection