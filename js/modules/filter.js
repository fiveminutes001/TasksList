function filterChange() {
	$('#task-filter').change(function () {
		console.log($(this).find(':selected').text());
	});
}

function sortChange() {
	$('#task-sort').change(function () {
		console.log($(this).find(':selected').text());
	});
}

export { filterChange, sortChange };
