import * as setup from './js/modules/initialSetup.js';
import * as task from './js/modules/task.js';
import * as searchResults from './js/modules/serachResults.js';
import * as db from './js/modules/db.js';

window.onload = function () {
	(function () {
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
							event.preventDefault();
							event.stopPropagation();
							form.classList.add('was-validated');
							resolve();
						},
						false
					);
				});
			});
		}

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
			.then(function () {
				formSubmit().then(task.setNewTask());
				console.log('New task form updated.');
			})
			.catch(function (err) {
				console.error('Tasks did not load currectly. ', err.statusText);
			});

		setup.initiateTooltips();

		searchResults.sortChange();
		searchResults.filterChange();
		searchResults.ascendingSort();
		searchResults.descendingSort();
	})();
};
