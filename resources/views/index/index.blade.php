@extends('app');

@section('content')

<div class="containerMaster">
    <div class="col-md-12 text-center">
        <button type="button" class="btn btn-primary" onclick="sendFrmAdminlogin();">Administrador</button>
    </div>
    <br>
    <div class="col-md-12 text-center">
        <button type="button" class="btn btn-primary" onclick="sendFrmTeacherlogin();">Docente</button>
    </div>
</div>
@endsection

@section('js')

<script src="{{asset('viewresources/login/login.js')}}"></script>

@endsection