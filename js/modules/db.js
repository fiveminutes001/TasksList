import * as setup from './initialSetup.js';
import * as task from './task.js';

function getAllTasks(opts) {
	return new Promise(function (resolve, reject) {
		let xhr = new XMLHttpRequest();
		let params = opts.params;

		if (params && typeof params === 'object') {
			params = Object.keys(params)
				.map(function (key) {
					return encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
				})
				.join('&');
			opts.url = opts.url + '?' + params;
		}

		xhr.open(opts.method, opts.url, true);

		xhr.onload = function () {
			if (this.status >= 200 && this.status < 300) {
				let response = JSON.parse(xhr.responseText);
				console.log('db query successful: ', response);
				resolve(response);
			} else {
				console.log('db query not successful.');
				reject({
					status: this.status,
					statusText: xhr.statusText,
				});
			}
		};
		xhr.onerror = function () {
			reject({
				status: this.status,
				statusText: xhr.statusText,
			});
		};

		xhr.send();
	});
}

function sendTasks(params) {
	let opts = {
		method: 'GET',
		url: 'db.php',
		params: { q: 0, data: JSON.stringify(params) },
	};

	getAllTasks(opts);
}

function getTasks() {
	//receive
	let opts = {
		method: 'GET',
		url: 'db.php',
		params: { q: 1, data: 0 },
	};

	getAllTasks(opts)
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
}
export { getTasks, sendTasks };
