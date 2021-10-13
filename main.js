import * as setup from './js/modules/initialSetup.js';
import * as task from './js/modules/task.js';
import * as searchResults from './js/modules/serachResults.js';
console.log('db connection: ' + <?= json_encode($connection_status) ?>);
window.onload = function () {
	(function () {
		bootlint.showLintReportForCurrentDocument([], {
			hasProblems: false,
			problemFree: false,
		});
		setup.setParams();
		setup.initiateTooltips();
		task.setNewTask();
		task.sendTasksToContainer(task.getParamsArr());
		setup.formSetup();
		searchResults.sortChange();
		searchResults.filterChange();
		searchResults.ascendingSort();
		searchResults.descendingSort();
	})();
};
