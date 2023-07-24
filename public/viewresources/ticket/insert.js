'use strict';

$(() =>
{
	$('#frmTicketInsert').formValidation(
	{
		framework: 'bootstrap',
		excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
		live: 'enabled',
		message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
		trigger: null,
		fields:
		{
			txtTitle:
			{
				validators:
				{
					notEmpty:
					{
						message: '<b style="color: red;">Este campo es requerido.</b>'
					}
				}
			}
		}
	});
});

function sendFrmTicketInsert() {
	var isValid = null;

	$('#frmTicketInsert').data('formValidation').resetForm();
	$('#frmTicketInsert').data('formValidation').validate();

	isValid = $('#frmTicketInsert').data('formValidation').isValid();

	if(!isValid) {
		new PNotify(
		{
			title : 'No se pudo proceder',
			text : 'Complete y corrija toda la infirmación del formulario.',
			type : 'error'
		});

		return;
	}

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

			$('#frmTicketInsert')[0].submit();
		}
	});
}