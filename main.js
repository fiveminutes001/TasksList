import * as setup from './js/modules/initialSetup.js';
import * as task from './js/modules/task.js';
import * as searchResults from './js/modules/serachResults.js';

window.onload = function () {
	bootlint.showLintReportForCurrentDocument([], {
		hasProblems: false,
		problemFree: false,
	});

	setup.initiateTooltips();
	task.setNewTask();
	task.sendTasksToContainer(task.getParamsArr());
	setup.formSetup();
	searchResults.sortChange();
	searchResults.filterChange();
	searchResults.ascendingSort();
	searchResults.descendingSort();
	setup.deleteButtonSetup(document.querySelectorAll('button.delete-task-btn'));

	console.log(task.checkIfCanDeleteTask(task.getParamsArr()[0]));
};
