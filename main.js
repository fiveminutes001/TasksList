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

		db.getAllTasks(opts)
			.then(function (response) {
				setup.setParams(response);
				task.sendTasksToContainer(task.getParamsArr());
			})
			.then(function () {
				setup.formSetup();
				console.log('Tasks loaded.');
			})
			.catch(function (err) {
				console.error('Tasks did not load currectly. ', err.statusText);
			});

		(function () {
			'use strict';

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation');

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms).forEach(function (form) {
				form.addEventListener(
					'submit',
					function (event) {
						if (!form.checkValidity()) {
							event.preventDefault();
							event.stopPropagation();
						}
						console.log('form ok');
						event.preventDefault();
						event.stopPropagation();
						const taskId = (Window.data.paramsArr.length + 1).toString();
						const taskParams = Object.assign({}, Window.data.blankTask);
						let newTaskParams = getNewTaskCurrentData(taskId);
						taskParams ? (confirm('Task ' + taskId + ' will be added. Continue?') ? mergeNewTaskData(taskParams, newTaskParams) : console.log('Task ' + taskParams.taskId + ' add canceled.')) : alert('Task' + taskParams.taskId + "can't be added");

						form.classList.add('was-validated');
					},
					false
				);
			});
		})();

		setup.initiateTooltips();
		task.setNewTask();

		searchResults.sortChange();
		searchResults.filterChange();
		searchResults.ascendingSort();
		searchResults.descendingSort();
	})();
};
