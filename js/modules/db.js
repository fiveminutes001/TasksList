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

function sendTasks(params) {
	console.log('!', params);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText);
		}
	};
	xhttp.open('GET', 'db.php', true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	//xhttp.send('fname=Henry&lname=Ford');

	xhttp.send('q=Henry&dev=Ford');
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
			sendTasks(task.getParamsArr());
		})
		.catch(function (err) {
			console.error('Tasks did not load currectly. ', err.statusText);
		});
}
export { getTasks, sendTasks };
