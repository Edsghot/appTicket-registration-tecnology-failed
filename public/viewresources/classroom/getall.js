'use strict';

function deleteClassroom(idAdmin) {
	swal(
	{
		title : 'Confirmar operación',
		text : '¿Realmente desea proceder?',
		icon : 'warning',
		buttons : ['No, cancelar.', 'Si, proceder.']
	})
	.then((proceed) =>
	{
		if(proceed)
		{
			//Llamar aquí a la función para mostrar el loader.

			window.location.href = _urlBase + '/admin/delete/' + idAdmin;
		}
	});
}