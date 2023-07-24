@extends('template.layout')
@section('titleGeneral', 'Registrar ciudad...')
@section('sectionGeneral')
<form id="frmCityInsert" action="{{url('teacher/insert')}}" method="post">
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
			<label for="txtPassword">Codigo</label>
			<input type="text" id="txtPassword" name="txtPassword" class="form-control">
        
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-primary" onclick="sendFrmCityInsert();">Registrar datos</button>
		</div>
	</div>
</form>
@endsection
@section('js')
<script src="{{asset('viewresources/teacher/insert.js')}}"></script>
@endsection