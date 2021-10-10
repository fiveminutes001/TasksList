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
	$('#setDate').datepicker({
		format: 'dd/mm/yyyy',
		autoclose: true,
		todayHighlight: true,
		startDate: currentDate,
		minDate: currentDate,
		maxViewMode: 2,
	});

	$('#setDate').on('click', function (event) {
		$('#setDate')
			.datepicker('show')
			.on('changeDate', function (dateChangeEvent) {
				$('#setDate').datepicker('hide');
				$('#setDate').text(formatDate(dateChangeEvent.date));
			});
	});

	setup.initiateTooltips();
	setup.setNewTaskSection();
	task.sendTasksToContainer(task.getParamsArr());
	setup.formSetup();
};
