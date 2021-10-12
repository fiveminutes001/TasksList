function getParamsArr() {
	return [
		{
			taskId: 1,
			taskName: 'Task name',
			taskDetails: 'Task details',
			dueDate: '13/10/21',
			taskStatus: 'Completed',
			canBeDeleted: false,
			taskDeleted: false,
		},
		{
			taskId: 2,
			taskName: 'Task 2 name',
			taskDetails: 'Task 2 details',
			dueDate: '22/08/21',
			taskStatus: 'Not finished',
			canBeDeleted: false,
			taskDeleted: false,
		},
		{
			taskId: 3,
			taskName: 'Task 3 name',
			taskDetails: 'Task 3 details',
			dueDate: '10/10/2021',
			taskStatus: 'Not finished',
			canBeDeleted: true,
			taskDeleted: false,
		},
	];
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
