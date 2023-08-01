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
<form id="frmAdminlogin" action="{{url('admin/insert')}}" method="post">
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
			<button type="button" class="btn btn-primary" onclick="sendFrmAdminlogin();">Registrar datos</button>
		</div>
	</div>
</form>
@endsection
@section('js')
<script src="{{asset('viewresources/admin/insert.js')}}"></script>
@endsection