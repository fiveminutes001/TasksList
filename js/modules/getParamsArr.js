function getParamsArr() {
	return [
		{
			taskId: 1,
			taskName: 'Task name',
			taskDetails: 'Task details',
			dueDate: '13/10/21',
			taskStatus: 'Completed',
			canBeDeleted: false,
		},
		{
			taskId: 2,
			taskName: 'Task 2 name',
			taskDetails: 'Task 2 details',
			dueDate: '22/08/21',
			taskStatus: 'Not finished',
			canBeDeleted: false,
		},
		{
			taskId: 3,
			taskName: 'Task 3 name',
			taskDetails: 'Task 3 details',
			dueDate: '10/10/2021',
			taskStatus: 'Not finished',
			canBeDeleted: true,
		},
	];
}

export { getParamsArr };
