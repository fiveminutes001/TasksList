function getParamsArr() {
	return Window.data.paramsArr;
}

function updateParamsArr(newTaskParams) {
	const paramsArr = getParamsArr();
	try {
		for (let params of paramsArr) {
			if (newTaskParams.taskId == params.taskId) {
				params = Object.assign(params, newTaskParams);
				const newParamsArr = Object.assign(paramsArr, params);
				Window.data.paramsArr = newParamsArr;
				console.log('Task ' + params.taskId + ' updated:', params);
				return params;
			}
		}
	} catch (error) {
		console.log('Task ' + params.taskId + ' did not update. ' + error);
	}
}

export { getParamsArr, updateParamsArr };
