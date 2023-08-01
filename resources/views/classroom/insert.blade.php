@extends('template.layout')
@section('titleGeneral', 'Registrar Salon')

@section('roles')
	<div class="info">
		<a href="../admin/getall" class="d-block">ADMINISTRADOR</a>
	</div>
@endsection

@section('listaRutas')
	@section('title')
	<p>
		Salones
		<i class="right fas fa-angle-left"></i>
	</p>
	@endsection
	@section('rutas')
	<a href="../classroom/getall" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>Lista de salones</p>
	</a>
	<a href="../classroom/insert" class="nav-link active">
		<i class="far fa-circle nav-icon"></i>
		<p>insertar salones</p>
	</a>
	@endsection
@endsection


@section('sectionGeneral')
<form id="frmClassroomInsert" action="{{url('classroom/insert')}}" method="post">
	@csrf <!-- Este es el campo del token CSRF -->
	<div class="row">
		<div class="col-md-12 form-group">

			<label for="txtName">nombre</label>
			<input type="text" id="txtName" name="txtName" class="form-control">
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-primary" onclick="sendFrmClassroomInsert();">Registrar datos</button>
		</div>
	</div>
</form>
@endsection
@section('js')
<script src="{{asset('viewresources/classroom/insert.js')}}"></script>
@endsection
