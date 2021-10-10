import * as task from './task.js';

function initiateTooltips() {
	$('[data-toggle="tooltip"]').tooltip();
}

function formSetup() {
	$('.js-edit, .js-save').on('click', function () {
		var $form = $(this).closest('form');
		$form.toggleClass('is-readonly is-editing');
		var isReadonly = $form.hasClass('is-readonly');
		$form.find('input,textarea,select').prop('disabled', isReadonly);
	});
}

function formatDate(date) {
	return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
}

function datePickerSetup(dateInputId) {
	var currentDate = formatDate(new Date());

	$('#' + dateInputId).datepicker({
		format: 'dd/mm/yyyy',
		autoclose: true,
		todayHighlight: true,
		startDate: currentDate,
		minDate: currentDate,
		maxViewMode: 2,
	});

	$('#' + dateInputId).on('click', function (event) {
		$('#' + dateInputId)
			.datepicker('show')
			.on('changeDate', function (dateChangeEvent) {
				$('#' + dateInputId).datepicker('hide');
				$('#' + dateInputId).text(formatDate(dateChangeEvent.date));
			});
	});
}

export { initiateTooltips, formSetup, formatDate, datePickerSetup };
