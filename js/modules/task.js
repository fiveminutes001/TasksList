import { getParams } from './getParams.js';

function getTodayDate() {
	let today = new Date();
	let date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
	return date;
}

function getTaskData(taskId) {
	return (oldTask = {
		taskId: taskId,
		taskName: document.querySelector('.task-' + taskId + '-name').innerHTML,
		taskDetails: document.querySelector('.task-' + taskId + '-details').innerHTML,
		dueDate: document.querySelector('.task-' + taskId + '-due-date').innerHTML,
		canBeDeleted: document.querySelector('.task-' + taskId).classList.contains('can-be-deleted') ? true : false,
	});
}

function getTaskFromTemplate(getParams()) {
	let temp = document.getElementsByTagName('template')[0];
	let toDo = temp.content.cloneNode(true);

	let dueDate = toDo.querySelector('#task-0-due-date');
	dueDate.setAttribute('value', getTodayDate());
	dueDate.setAttribute('min', getTodayDate());

	toDo.querySelector('#task-0').id = 'task-' + params.taskId;

	let buttonElement = toDo.querySelector('#task-0-button');
	buttonElement.id = 'task-' + params.taskId + '-button';
	buttonElement.innerHTML = 'Task #' + params.taskId;
	buttonElement.setAttribute('data-target', '#collapseToDo' + params.taskId);
	buttonElement.setAttribute('aria-controls', 'collapseToDo' + params.taskId);

	let divElement = toDo.querySelector('#collapseToDo0');
	divElement.id = 'collapseToDo' + params.taskId;

	let nameLabel = toDo.querySelector('label[for="task-0-name"]');
	nameLabel.setAttribute('for', 'task-' + params.taskId + '-name');

	let dateLabel = toDo.querySelector('label[for="task-0-due-date"]');
	nameLabel.setAttribute('for', 'task-' + params.taskId + '-due-date');

	let detailsLabel = toDo.querySelector('label[for="task-0-details"]');
	nameLabel.setAttribute('for', 'task-' + params.taskId + '-details');

	let nameInputElement = toDo.querySelector('#task-0-name');
	nameInputElement.id = '#task-' + params.taskId + '-name';

	let dateInputElement = toDo.querySelector('#task-0-due-date');
	nameInputElement.id = '#task-' + params.taskId + '-due-date';

	let detailsInputElement = toDo.querySelector('#task-0-details');
	nameInputElement.id = '#task-' + params.taskId + '-details';

	return toDo;
}

export { getTodayDate, getTaskData, getTaskFromTemplate };
