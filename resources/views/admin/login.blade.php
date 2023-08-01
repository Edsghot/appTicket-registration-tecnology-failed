@extends('app');
@section('content')
<form id="frmAdminlogin" action="{{url('admin/login')}}" method="post">
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
			<button type="button" class="btn btn-primary" onclick="sendFrmAdminlogin();"> Iniciar</button>
		</div>
	</div>
</form>
@endsection
@section('js')
<script src="{{asset('viewresources/admin/login.js')}}"></script>
@endsection