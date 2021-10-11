function filterChange() {
	$('#task-filter').change(function () {
		console.log($(this).find(':selected').text());
	});
}

function sortChange() {
	$('#task-filter').change(function () {
		console.log($(this).find(':selected').text());
	});
}

export { filterChange, sortChange };
