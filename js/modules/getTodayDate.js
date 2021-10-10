function getTodayDate() {
	console.log('success!');
	let today = new Date();
	let date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
	return date;
}
export { getTodayDate };
