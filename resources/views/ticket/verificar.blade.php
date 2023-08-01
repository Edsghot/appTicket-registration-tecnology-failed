@extends('template.layout')
@section('titleGeneral', 'lista ticket')
@section('roles')
	<div class="info">
		<a href="../../ticket/insert" class="d-block">DOCENTE</a>
	</div>
@endsection

@section('listaRutas')
	
@endsection
@section('sectionGeneral')


<form id="frmTicketInsert" action="{{ url('ticket/verify/' . $txtCode) }}" method="post">
	@csrf <!-- Este es el campo del token CSRF -->
	<div class="row">
		<div class="col-md-12 form-group">

			<label for="txtCode">Codigo</label>
			<input type="text" id="txtCode" name="txtCode" class="form-control">
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-primary" onclick="sendFrmTicketInsert();"> Verificar</button>
		</div>
	</div>
</form>



<table class="table table-striped">
	<thead>
		<tr>
			<th>id Ticket</th>
			<th>codigo</th>
			<th>titulo</th>
			<th>detalles</th>
			<th>id Profesor</th>
			<th>fecha</th>
			<th>estado</th>
			<th>id Salon</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($listTicket as $ticket)
			<tr>
				<td>{{$ticket->idTicket}}</td>
				<td>{{$ticket->code}}</td>
				<td>{{$ticket->title}}</td>
				<td>{{$ticket->details}}</td>
				<td>{{$ticket->teacher_id}}</td>
				<td>{{$ticket->date}}</td>
				<td>{{$ticket->status ? 'Activo' : 'Inactivo'}}</td>
				<td>{{$ticket->idClassroom}}</td>
				<td class="text-right">
					<button class="btn btn-xs btn-default" onclick="deleteTicket('{{$ticket->idTicket}}');">Eliminar</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('js')
<script src="{{asset('viewresources/ticket/getall.js')}}"></script>
@endsection
