import * as setup from './js/modules/initialSetup.js';
import * as task from './js/modules/task.js';
import * as searchResults from './js/modules/serachResults.js';
import * as db from './js/modules/db.js';
import { getParamsArr } from './js/modules/getParamsArr.js';

window.onload = function () {
	(function () {
		bootlint.showLintReportForCurrentDocument([], {
			hasProblems: false,
			problemFree: false,
		});

		db.getTasks();
		setup.initiateTooltips();
		task.setNewTask();
		searchResults.sortChange();
		searchResults.filterChange();
		searchResults.ascendingSort();
		searchResults.descendingSort();
	})();
};
