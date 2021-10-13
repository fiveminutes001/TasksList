import { setParams } from './initialSetup.js';
function getAllTasks(opts) {
	return new Promise(function (resolve, reject) {
		let xhr = new XMLHttpRequest();
		xhr.open(opts.method, opts.url);
		//xmlhttp.open('GET', 'db.php?q=' + q + '&dev=' + dev, true);
		xhr.onload = function () {
			if (this.status >= 200 && this.status < 300) {
				let response = JSON.parse(xhr.responseText);
				console.log('initial db data loaded: ', response);
				resolve(response);
			} else {
				console.log('initial db data not loaded.');
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

		if (opts.headers) {
			Object.keys(opts.headers).forEach(function (key) {
				xhr.setRequestHeader(key, opts.headers[key]);
			});
		}
		var params = opts.params;
		// We'll need to stringify if we've been given an object
		// If we have a string, this is skipped.
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
export { getAllTasks };
