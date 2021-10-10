import { formBox } from './js/modules/formBox.js';
import { getTodayDate } from './js/modules/getTodayDate.js';

window.onload = function () {
	bootlint.showLintReportForCurrentDocument([], {
		hasProblems: false,
		problemFree: false,
	});

	$('[data-toggle="tooltip"]').tooltip();

	let newTaskDueDate = document.querySelector('#new-task-due-date');
	newTaskDueDate.setAttribute('value', getTodayDate());
	newTaskDueDate.setAttribute('min', getTodayDate());
};
