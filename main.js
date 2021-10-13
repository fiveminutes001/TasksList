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

		function formSubmit() {
			return new Promise(function (resolve, reject) {
				var forms = document.querySelectorAll('.needs-validation');
				Array.prototype.slice.call(forms).forEach(function (form) {
					form.addEventListener(
						'submit',
						function (event) {
							if (!form.checkValidity()) {
								event.preventDefault();
								event.stopPropagation();
							}

							form.classList.add('was-validated');
							resolve();
						},
						false
					);
				});
			});
		}

		setup.initiateTooltips();
		task.setNewTask();
		formSubmit().then(setup.addNewTaskButtonSetup());
		searchResults.sortChange();
		searchResults.filterChange();
		searchResults.ascendingSort();
		searchResults.descendingSort();
	})();
};
