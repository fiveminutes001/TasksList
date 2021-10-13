import * as setup from './js/modules/initialSetup.js';
import * as task from './js/modules/task.js';
import * as searchResults from './js/modules/serachResults.js';
import * as db from './js/modules/db.js';

window.onload = function () {
	(function () {
		bootlint.showLintReportForCurrentDocument([], {
			hasProblems: false,
			problemFree: false,
		});

		let opts = {
			method: 'GET',
			url: 'db.php',
			params: { q: 'a', dev: 0 },
		};

		db.getAllTasks(opts).then(function (response) {
			setup.setParams(response);
			task.sendTasksToContainer(task.getParamsArr());
		});

		setup.initiateTooltips();
		task.setNewTask();

		setup.formSetup();
		searchResults.sortChange();
		searchResults.filterChange();
		searchResults.ascendingSort();
		searchResults.descendingSort();
	})();
};
