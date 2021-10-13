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
			console.log('!', params);
			console.log('!!', opts.url);
		}

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

		xhr.send();
	});
}
export { getAllTasks };
