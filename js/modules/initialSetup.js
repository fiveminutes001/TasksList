import { checkIfCanDeleteTask } from './task.js';
import { getParamsArr } from './getParamsArr.js';

function saveButtonSetup(saveButton) {
	$(saveButton).on('click', function () {
		console.log('save');
	});
}

function getTaskParamsFromTaskId(taskId) {
	const paramsArr = getParamsArr();

	for (let params of paramsArr) {
		if (params.taskId == taskId) {
			return params;
		}
	}
}

function deleteButtonSetup(deleteButton) {
	$(deleteButton).on('click', function () {
		const taskParams = getTaskParamsFromTaskId(deleteButton.getAttribute('task-id'));

		if (taskParams) {
			checkIfCanDeleteTask(taskParams)
				? confirm('Task ' + taskParams.taskId + ' will be deleted. Continue?')
					? console.log('Task ' + taskParams.taskId + ' deleted.')
					: console.log('Task ' + taskParams.taskId + ' deletion canceled.')
				: alert('Task' + taskParams.taskId + "can't be deleted");
		}
	});
}
function saveButtonSetup(saveButton) {
	$(saveButton).on('click', function () {
		const taskParams = getTaskParamsFromTaskId(saveButton.getAttribute('task-id'));

		taskParams
			? confirm('Task ' + taskParams.taskId + ' will be saved. Continue?')
				? console.log('Task ' + taskParams.taskId + ' saved.')
				: console.log('Task ' + taskParams.taskId + ' save canceled.')
			: alert('Task' + taskParams.taskId + "can't be saved");
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
