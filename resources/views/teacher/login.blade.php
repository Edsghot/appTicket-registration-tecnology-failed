@extends('app');
@section('content')

<div  class="containerLogin">
<form id="frmTeacherlogin" action="{{url('teacher/login')}}" method="post">
@csrf <!-- Este es el campo del token CSRF -->
	<div class="row">
		<div class="col-md-12 form-group">
			<label for="txtCode">Codigo</label>
            <input type="text" id="txtCode" name="txtCode" class="form-control">
            <label for="txtPassword">password</label>
			<input type="password" id="txtPassword" name="txtPassword" class="form-control">
			
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-primary" onclick="sendfrmTeacherlogin();">ingresar</button>
		</div>
	</div>
</form>
</div>
@endsection
@section('js')
<script src="{{asset('viewresources/teacher/login.js')}}"></script>
@endsection