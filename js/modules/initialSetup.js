import { checkIfCanDeleteTask, getNewTaskCurrentData, getTaskCurrentData, mergeCurrentTaskData, mergeNewTaskData, deleteTask } from './task.js';
import { getParamsArr } from './getParamsArr.js';

function setParams(paramsArrDataFromDb) {
	Window.data = {
		paramsArr: paramsArrDataFromDb,
		blankTask: {
			taskId: null,
			taskName: 'Task name',
			taskDetails: 'Task details',
			dueDate: null,
			taskStatus: 'Not finished',
			canBeDeleted: false,
			taskDeleted: false,
		},
	};
}

function getTaskParamsFromTaskId(taskId) {
	const paramsArr = getParamsArr();

	for (let params of paramsArr) {
		if (params.taskId == taskId) {
			console.log('Task ' + taskId + ' data is:', params);
			return params;
		}
	}
	console.log('No data was found for task ' + taskId + '.');
}

function deleteButtonSetup(deleteButton) {
	$(deleteButton).on('click', function () {
		const taskId = deleteButton.getAttribute('task-id');
		const taskParams = getTaskParamsFromTaskId(taskId);

		let newTaskParams = { taskDeleted: true };
		if (taskParams) {
			checkIfCanDeleteTask(taskParams)
				? confirm('Task ' + taskParams.taskId + ' will be deleted. Continue?')
					? deleteTask(taskParams, newTaskParams)
					: console.log('Task ' + taskParams.taskId + ' deletion canceled.')
				: alert('Task ' + taskParams.taskId + " can't be deleted");
		}
	});
}

function saveButtonSetup(saveButton) {
	$(saveButton).on('click', function () {
		const taskId = saveButton.getAttribute('task-id');
		const taskParams = getTaskParamsFromTaskId(taskId);
		let newTaskParams = getTaskCurrentData(taskId);
		taskParams
			? confirm('Task ' + taskParams.taskId + ' will be saved. Continue?')
				? mergeCurrentTaskData(taskParams, newTaskParams)
				: console.log('Task ' + taskParams.taskId + ' save canceled.')
			: alert('Task' + taskParams.taskId + "can't be saved");
	});
}

function addNewTaskButtonSetup() {
	//function addNewTaskButtonSetup(addButton) {
	// $(addButton).on('click', function () {
	const taskId = (Window.data.paramsArr.length + 1).toString();
	const taskParams = Object.assign({}, Window.data.blankTask);
	let newTaskParams = getNewTaskCurrentData(taskId);
	taskParams ? (confirm('Task ' + taskId + ' will be added. Continue?') ? mergeNewTaskData(taskParams, newTaskParams) : console.log('Task ' + taskParams.taskId + ' add canceled.')) : alert('Task' + taskParams.taskId + "can't be added");
	//});
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
				console.log(dateChangeEvent.date);
			});
	});
}

export { setParams, addNewTaskButtonSetup, getTaskParamsFromTaskId, saveButtonSetup, deleteButtonSetup, initiateTooltips, formSetup, formatDate, datePickerSetup };
