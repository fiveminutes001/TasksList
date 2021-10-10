import * as task from './task.js';

function initiateTooltips() {
	$('[data-toggle="tooltip"]').tooltip();
}

function setNewTaskSection() {
	let newTaskDueDate = document.querySelector('#new-task-due-date');
	newTaskDueDate.setAttribute('value', task.getTodayDate());
	newTaskDueDate.setAttribute('min', task.getTodayDate());
}

function formSetup() {
	$('.js-edit, .js-save').on('click', function () {
		var $form = $(this).closest('form');
		$form.toggleClass('is-readonly is-editing');
		var isReadonly = $form.hasClass('is-readonly');
		$form.find('input,textarea').prop('disabled', isReadonly);
	});
}

export { initiateTooltips, setNewTaskSection, formSetup };
