$(document).ready(function () {
	$('.js-edit, .js-save').on('click', function () {
		var $form = $(this).closest('form');
		$form.toggleClass('is-readonly is-editing');
		var isReadonly = $form.hasClass('is-readonly');
		$form.find('input,textarea').prop('disabled', isReadonly);
	});
	let newTaskDueDate = toDo.querySelector('#new-task-due-date');
	newTaskDueDate.setAttribute('value', getTodayDate());
	newTaskDueDate.setAttribute('min', getTodayDate());
});
