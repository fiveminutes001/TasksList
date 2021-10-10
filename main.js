import * as setup from './js/modules/initialSetup.js';
import * as task from './js/modules/task.js';

window.onload = function () {
	bootlint.showLintReportForCurrentDocument([], {
		hasProblems: false,
		problemFree: false,
	});

	$('.datepicker').datepicker({
		format: 'dd/mm/yyyy',
		startDate: '0d',
		endDate: '+365d',
	});

	setup.initiateTooltips();
	setup.setNewTaskSection();
	task.sendTasksToContainer(task.getParamsArr());
	setup.formSetup();
};
