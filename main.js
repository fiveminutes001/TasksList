import * as setup from './js/modules/initialSetup.js';
import * as task from './js/modules/task.js';

window.onload = function () {
	bootlint.showLintReportForCurrentDocument([], {
		hasProblems: false,
		problemFree: false,
	});

	function formatDate(date) {
		return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
	}
	var currentDate = formatDate(new Date());

	$('#new-task-due-date').datepicker({
		format: 'dd/mm/yyyy',
		autoclose: true,
		todayHighlight: true,
		startDate: currentDate,
		minDate: currentDate,
		maxViewMode: 2,
	});

	$('#new-task-due-date').on('click', function (event) {
		$('#new-task-due-date')
			.datepicker('show')
			.on('changeDate', function (dateChangeEvent) {
				$('#new-task-due-date').datepicker('hide');
				$('#new-task-due-date').text(formatDate(dateChangeEvent.date));
			});
	});

	setup.initiateTooltips();

	task.sendTasksToContainer(task.getParamsArr());
	setup.formSetup();
};
