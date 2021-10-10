$(document).ready(function () {
	$('.js-edit, .js-save').on('click', function () {
		var $form = $(this).closest('form');
		$form.toggleClass('is-readonly is-editing');
		var isReadonly = $form.hasClass('is-readonly');
		$form.find('input,textarea').prop('disabled', isReadonly);
	});
	$('.task-button').on('click', function (e) {
		var $_target = $(e.currentTarget);
		var $_taskBody = $_target.find('.collapse');
		if ($_taskBody) {
			$_taskBody.collapse('toggle');
		}
	});
});
