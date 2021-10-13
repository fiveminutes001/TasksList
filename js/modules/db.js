import { setParams } from './initialSetup.js';
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
				console.log('Initial db data loaded: ', response);
				resolve(response);
			} else {
				console.log('Initial db data not loaded.');
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
function sendAllTasks(opts) {
	return new Promise(function (resolve, reject) {
		let xhr = new XMLHttpRequest();
		xhr.open(opts.method, opts.url);

		xhr.onload = function () {
			if (this.status >= 200 && this.status < 300) {
				let response = JSON.parse(xhr.responseText);
				console.log('Initial db data loaded: ', response);
				resolve(response);
			} else {
				console.log('Initial db data not loaded.');
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
		let params = opts.params;
		if (params && typeof params === 'object') {
			params = Object.keys(params)
				.map(function (key) {
					return encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
				})
				.join('&');
		}
		xhr.send(params);
	});
}

function sendTasks() {
	//send
	opts = {
		method: 'POST',
		url: 'db.php',
		params: { b: 'a', c: 1 },
	};

	sendAllTasks(opts)
		.then(function (response) {
			console.log('Tasks were sent currectly.');
		})
		.catch(function (err) {
			console.error('Tasks were not sent currectly. ', err.statusText);
		});
}
function getTasks() {
	//receive
	let opts = {
		method: 'GET',
		url: 'db.php',
		params: { q: 'a', dev: 0 },
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
