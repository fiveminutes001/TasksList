import { setParams } from './initialSetup.js';
function getAllTasks() {
	//sending AJAX request
	const xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			try {
				let response = JSON.parse(xmlhttp.responseText);
				console.log('initial db data loaded: ', response);
				setParams(response);
			} catch (error) {
				console.log('initial db data not loaded: ' + error);
			}
		}
	};
	let dev = 0;
	const q = 'all tasks';
	xmlhttp.open('GET', 'db.php?q=' + q + '&dev=' + dev, true);
	xmlhttp.send();
}
export { getAllTasks };
