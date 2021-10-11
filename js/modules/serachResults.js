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

function ascendingSort () {
    $('#ascending').on('click', function () {
		console.log("asc");
    }
}

function descendingSort () {
    $('#descending').on('click', function () {
		console.log("des");
    }
}
export { filterChange, sortChange, ascendingSort, descendingSort };
