import { checkIfCanDeleteTask } from './task.js';
import { getParamsArr } from './getParamsArr.js';

function saveButtonSetup(saveButton) {
	$(saveButton).on('click', function () {
		console.log('save');
	});
}

function deleteButtonSetup(deleteButton) {
	$(deleteButton).on('click', function () {
		const paramsArr = getParamsArr();
		const taskParams = null;
		for (const params of paramsArr) {
			if (params.taskId == deleteButton.getAttribute('task-id')) {
				taskParams = params;
				break;
			}
		}
		console.log(params);
		// console.log(checkIfCanDeleteTask(getParamsArr()[0]));
	});
}

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
	let currentDate = formatDate(new Date());

	$(dateInputId).datepicker({
		format: 'dd/mm/yyyy',
		autoclose: true,
		todayHighlight: true,
		startDate: currentDate,
		minDate: currentDate,
		maxViewMode: 2,
	});

	$(dateInputId).on('click', function (event) {
		$(dateInputId)
			.datepicker('show')
			.on('changeDate', function (dateChangeEvent) {
				$(dateInputId).datepicker('hide');
				$(dateInputId).text(formatDate(dateChangeEvent.date));
			});
	});
}

export { saveButtonSetup, deleteButtonSetup, initiateTooltips, formSetup, formatDate, datePickerSetup };
