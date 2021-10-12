import * as setup from './js/modules/initialSetup.js';
import * as task from './js/modules/task.js';
import * as searchResults from './js/modules/serachResults.js';

window.onload = function () {
	(function () {
		bootlint.showLintReportForCurrentDocument([], {
			hasProblems: false,
			problemFree: false,
		});
		Window.data = {
			paramsArr: [
				{
					taskId: '1',
					taskName: 'Task name',
					taskDetails: 'Task details',
					dueDate: '13/10/21',
					taskStatus: 'Completed',
					canBeDeleted: false,
					taskDeleted: false,
				},
				{
					taskId: '2',
					taskName: 'Task 2 name',
					taskDetails: 'Task 2 details',
					dueDate: '22/08/21',
					taskStatus: 'Not finished',
					canBeDeleted: false,
					taskDeleted: false,
				},
				{
					taskId: '3',
					taskName: 'Task 3 name',
					taskDetails: 'Task 3 details',
					dueDate: '10/10/2021',
					taskStatus: 'Not finished',
					canBeDeleted: true,
					taskDeleted: false,
				},
			],
		};
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
