@extends('template.layout')
@section('titleGeneral', 'Registrar ticket...')
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
