import { formBox } from './js/modules/formBox.js';
import * as setup from './js/modules/initialSetup.js';
import * as task from './js/modules/task.js';

window.onload = function () {
	bootlint.showLintReportForCurrentDocument([], {
		hasProblems: false,
		problemFree: false,
	});

	setup.formSetup();
	setup.initiateTooltips();
	setup.setNewTaskSection();

	task.sendTasksToContainer();
};
