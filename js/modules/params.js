function getParams() {
	return [
		{
			taskId: 1,
			taskName: 'Task name',
			taskDetails: 'Task details',
			dueDate: '21/08/21',
			canBeDeleted: false,
		},
		{
			taskId: 2,
			taskName: 'Task 2 name',
			taskDetails: 'Task 2 details',
			dueDate: '22/08/21',
			canBeDeleted: false,
		},
		{
			taskId: 3,
			taskName: 'Task 3 name',
			taskDetails: 'Task 3 details',
			dueDate: '23/08/21',
			canBeDeleted: true,
		},
	];
}

export { params };
