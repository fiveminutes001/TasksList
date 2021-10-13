function getAllTasks() {
	//sending AJAX request
	const xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let response = JSON.parse(xmlhttp.responseText);
			console.log(response);
		}
	};
	let dev = 0;
	const q = 'all tasks';
	xmlhttp.open('GET', 'db.php?q=' + q + '&dev=' + dev, true);
	xmlhttp.send();
}
export { getAllTasks };
