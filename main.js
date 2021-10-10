import { formBox } from './js/modules/formBox.js';
import * as task from './js/modules/task.js';

window.onload = function () {
	bootlint.showLintReportForCurrentDocument([], {
		hasProblems: false,
		problemFree: false,
	});

	formBox();

	$('[data-toggle="tooltip"]').tooltip();

	let newTask = new task();

	let newTaskDueDate = document.querySelector('#new-task-due-date');
	newTaskDueDate.setAttribute('value', newTask.getTodayDate());
	newTaskDueDate.setAttribute('min', newTask.getTodayDate());
};
