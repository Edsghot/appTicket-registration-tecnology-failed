'use strict';

$(() =>
{
	$('#frmTeacherlogin').formValidation(
	{
		framework: 'bootstrap',
		excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
		live: 'enabled',
		message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
		trigger: null,
		fields:
		{
			txtCode:
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

function sendfrmTeacherlogin() {
	var isValid = null;

	$('#frmTeacherlogin').data('formValidation').resetForm();
	$('#frmTeacherlogin').data('formValidation').validate();

	isValid = $('#frmTeacherlogin').data('formValidation').isValid();

	if(!isValid) {
		new PNotify(
		{
			title : 'No se pudo proceder',
			text : 'Complete y corrija toda la infirmación del formulario.',
			type : 'error'
		});

		return;
	}

	$('#frmTeacherlogin')[0].submit();

}