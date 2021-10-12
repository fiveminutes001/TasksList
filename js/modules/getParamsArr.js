function getParamsArr() {
	return paramsArr.initialParams;
}

function getTaskIndexInParamsArr(params) {
	for (let i = 0; i < paramsArr.length; i++) {
		if (params.taskId == paramsArr[i].taskId) {
			console.log('Task ' + params.taskId + ' found in place ' + i + ' in paramsArr.');
			return i;
		}
	}
	console.log('Task ' + taskId + ' was not found in paramsArr.');
}
function updateParamsArr(newTaskParams) {
	const paramsArr = getParamsArr();
	try {
		for (let params of paramsArr) {
			if (newTaskParams.taskId == params.taskId) {
				params = Object.assign(params, newTaskParams);
				console.log('Task ' + params.taskId + ' updated:', params);
				return params;
			}
		}
	} catch (error) {
		console.log('Task ' + params.taskId + ' did not update. ' + error);
	}
}

export { getParamsArr, updateParamsArr };
