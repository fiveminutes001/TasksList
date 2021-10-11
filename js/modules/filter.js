function optionChange() {
	$('#task-filter').change(function () {
		console.log($(this).find(':selected').text());
	});
}

export { optionChange };
