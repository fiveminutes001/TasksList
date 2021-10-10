import { getParamsArr } from './getParamsArr.js';

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

function getTaskFromTemplate(params) {
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

function sendTasksToContainer(paramsArr) {
	for (const params of paramsArr) {
		document.querySelector('#task-container').appendChild(getTodoFromTemplate(params));
	}
}

function updateTask(taskId) {
	let sectionHeader = document.querySelector('#section-header');

	let newTaskElements = {
		taskId: taskId,
		taskName: document.querySelector('#task-name'),
		taskDetails: document.querySelector('#task-details'),
		dueDate: document.querySelector('#task-due-date'),
		canBeDeleted: document.querySelector('.task-' + taskId).classList.contains('can-be-deleted') ? true : false,
	};
	let oldTask = getTaskData(taskId);
	console.log(oldTask);
	console.log(newTaskElements);

	if (oldTask) {
		newTaskElements.taskName.outerHTML = '';
	}
}
export { getTodayDate, getTaskData, getTaskFromTemplate, updateTask, sendTasksToContainer, getParamsArr };
