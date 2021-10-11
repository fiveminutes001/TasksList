import * as setup from './js/modules/initialSetup.js';
import * as task from './js/modules/task.js';

window.onload = function () {
	bootlint.showLintReportForCurrentDocument([], {
		hasProblems: false,
		problemFree: false,
	});

	setup.initiateTooltips();
	task.setNewTask();
	task.sendTasksToContainer(task.getParamsArr());
	setup.formSetup();
};
