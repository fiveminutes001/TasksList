<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&amp;display=swap" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <style>
        body {
            font-family: "Open Sans", sans-serif;
            line-height: 1.6;
        }


        .view-opt-label,
        .date-label {
            font-size: 0.8rem;
        }

        .edit-todo-input {
            font-size: 1.7rem !important;
        }

        .todo-actions {
            visibility: hidden !important;
        }

        .todo-item:hover .todo-actions {
            visibility: visible !important;
        }

        .todo-item.editing .todo-actions .edit-icon {
            display: none !important;
        }

        .label {
            min-width: 35px !important;
            display: inline-block !important
        }

        .icon {
            min-width: 35px !important;
            display: inline-block !important
        }
    </style>

</head>

<body>
    <div class="container m-5 p-2 rounded mx-auto bg-light shadow">

        <!-- App title section -->
        <div class="row m-1 p-4">
            <div class="col-2 col-sm-2 col-md-3 col-lg-3 col-xl-3"></div>
            <div class="col-8 col-sm-8 col-md-6 col-lg-6 col-xl-6">
                <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                    <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                    My Todo-s
                </div>
            </div>
            <div class="col-2 col-sm-2 col-md-3 col-lg-3 col-xl-3"></div>
        </div>

        <!-- Create task section -->
        <form>

            <div class="row m-1 p-3">

                <div class="col mx-auto">
                    <!-- Set task name-->
                    <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                        <div class="col-12  m-0 mt-2 text-left">
                            <label class="date-label my-2 text-black-50" id="section-header"><u>Add new</u></label>
                        </div>
                        <div class="col-12 col-sm-9 p-0 m-0 mt-2">
                            <input class="form-control form-control-lg p-1 add-todo-input bg-transparent text-center rounded" type="text" placeholder="Task name" required id="task-name">
                        </div>
                        <div class="col-12 col-sm-3 p-0 m-0 mt-2">
                            <input id="setDate" class="form-control form-control-lg p-1 add-todo-input bg-transparent text-center rounded" type="text" placeholder="Due date" required id="task-due-date">
                        </div>
                    </div>
                    <!-- Set details -->
                    <div class="row bg-white rounded shadow-sm p-2  add-todo-wrapper align-items-center justify-content-center">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">details</span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea" id="task-details"></textarea>
                        </div>
                    </div>
                    <!-- Set due date-->
                    <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-end">
                        <div class="px-0 mx-0 mr-2">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <!-- View options section -->
        <div class="row m-1 justify-content-end">

            <!--Filter-->
            <div class="col-12 col-sm-6 align-items-center d-flex justify-content-between">
                <label class="label text-secondary my-2 pr-2 view-opt-label">Filter</label>
                <select class="custom-select custom-select-sm my-2">
                    <option value="all" selected>All</option>
                    <option value="completed">Completed</option>
                    <option value="active">Active</option>
                    <option value="has-due-date">Has due date</option>
                </select>
                <div class="icon text-center">
                    <i class="fa fa fa-filter text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom"></i>
                </div>
            </div>

            <!--Sort-->
            <div class="col-12 col-sm-6 align-items-center d-flex justify-content-between">
                <label class="label text-secondary my-2 pr-2 view-opt-label">Sort</label>
                <select class="custom-select custom-select-sm my-2">
                    <option value="added-date-asc" selected>Added date</option>
                    <option value="due-date-desc">Due date</option>
                </select>
                <div class="icon text-center">
                    <i class="fa fa fa-sort-amount-asc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom" title="Ascending"></i>
                    <i class="fa fa fa-sort-amount-desc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom" title="Descending"></i>
                </div>
            </div>

            <!--Results-->
            <div class="col-12 m-0 text-left">
                <label class="date-label my-2 text-black-50">Total 4 tasks, 4 completed, 0 left</label>
            </div>
        </div>

        <!-- Todo list section -->
        <div class="row mx-1 pb-3 w-80" id="task-container">

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootlint/1.1.0/bootlint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        let paramsArr = [{
                'taskId': 1,
                'taskName': 'Task name',
                'taskDetails': 'Task details',
                'dueDate': '21/08/21',
                'canBeDeleted': false
            },
            {
                'taskId': 2,
                'taskName': 'Task 2 name',
                'taskDetails': 'Task 2 details',
                'dueDate': '22/08/21',
                'canBeDeleted': false
            },
            {
                'taskId': 3,
                'taskName': 'Task 3 name',
                'taskDetails': 'Task 3 details',
                'dueDate': '23/08/21',
                'canBeDeleted': true
            }
        ];

        function getTaskData(taskId) {
            return oldTask = {
                'taskId': taskId,
                'taskName': document.querySelector('.task-' + taskId + '-name').innerHTML,
                'taskDetails': document.querySelector('.task-' + taskId + '-details').innerHTML,
                'dueDate': document.querySelector('.task-' + taskId + '-due-date').innerHTML,
                'canBeDeleted': document.querySelector('.task-' + taskId).classList.contains('can-be-deleted') ? true : false,
            }
        }

        function updateTask(taskId) {

            let sectionHeader = document.querySelector('#section-header');

            let newTaskElements = {
                'taskId': taskId,
                'taskName': document.querySelector('#task-name'),
                'taskDetails': document.querySelector('#task-details'),
                'dueDate': document.querySelector('#task-due-date'),
                'canBeDeleted': document.querySelector('.task-' + taskId).classList.contains('can-be-deleted') ? true : false,
            }
            let oldTask = getTaskData(taskId);
            console.log(oldTask);
            console.log(newTaskElements);

            if (oldTask) {
                sectionHeader.innerHTML = "Editing task no." + taskId + ".";
                taskName.value = params.taskName;
                taskDueDate.value = params.dueDate;
                taskDetails.value = params.taskDetails;
            }
        }

        function createTask(params) {
            let task = document.createElement('div');
            task.classList.add('col-12', 'col-sm-6', 'm-0');
            task.setAttribute('task-id', params.taskId);

            let rowDiv = document.createElement('div');
            rowDiv.classList.add('row');

            let colDiv = document.createElement('div');
            colDiv.classList.add('col-12', 'm-0', 'p-1', 'pb-0');

            let pElement = document.createElement('p');
            pElement.classList.add('m-1');

            let buttonElement = document.createElement('button');
            buttonElement.classList.add('btn', 'btn-primary', 'w-100', 'task-' + params.taskId + '-name');
            buttonElement.setAttribute('type', 'button');
            buttonElement.setAttribute('data-toggle', 'collapse');
            buttonElement.setAttribute('data-target', '#collapseExample' + params.taskId);
            buttonElement.setAttribute('aria-expanded', 'false');
            buttonElement.setAttribute('aria-controls', 'collapseExample' + params.taskId);
            buttonElement.innerHTML = params.taskName;

            pElement.appendChild(buttonElement);
            colDiv.appendChild(pElement);
            rowDiv.appendChild(colDiv);

            let secondRowDiv = document.createElement('div');
            secondRowDiv.classList.add('row');

            let mDiv = document.createElement('div');
            mDiv.classList.add('m-0', 'w-100');

            let collapseDiv = document.createElement('div');
            collapseDiv.classList.add('collapse');
            collapseDiv.setAttribute('id', 'collapseExample' + params.taskId);

            let cardDiv = document.createElement('div');
            cardDiv.classList.add('card', 'card-body', 'ml-2', 'mr-2', 'mt-0', 'mb-3', 'pt-2', 'pb-1');

            let descP = document.createElement('p');
            descP.classList.add('task-' + params.taskId + '-details');
            descP.innerHTML = params.taskDetails;

            let flexDiv = document.createElement('div');
            flexDiv.classList.add('d-flex', 'flex-row', 'align-items-baseline');

            let iElement = document.createElement('i');
            iElement.classList.add('fa', 'fa-info-circle', 'my-2', 'text-black-50', 'm-2');
            iElement.setAttribute('data-toggle', 'tooltip');
            iElement.setAttribute('data-placement', 'bottom');
            iElement.setAttribute('title', 'Due date');
            iElement.setAttribute('data-original-title', 'Created date');

            let labelElement = document.createElement('label');
            labelElement.classList.add('date-label', 'my-2', 'my-2', 'text-black-50', 'm-2', 'task-' + params.taskId + '-due-date');
            labelElement.innerHTML = params.dueDate;

            let iElementEdit = document.createElement('i');
            iElementEdit.classList.add('fa', 'fa-pencil', 'text-info', 'm-2', 'p-0');
            // iElementEdit.setAttribute('data-toggle', 'tooltip');
            // iElementEdit.setAttribute('data-placement', 'bottom');
            // iElementEdit.setAttribute('title', 'Edit todo');
            iElementEdit.setAttribute('onclick', 'updateTask(' + params.taskId + ');');


            let iElementDelete = document.createElement('i');
            iElementDelete.classList.add('fa', 'fa-trash-o', 'text-danger', 'm-2', 'p-0');
            iElementDelete.setAttribute('data-toggle', 'tooltip');
            iElementDelete.setAttribute('data-placement', 'bottom');
            iElementDelete.setAttribute('title', 'Delete todo');


            flexDiv.appendChild(iElement);
            flexDiv.appendChild(labelElement);
            flexDiv.appendChild(iElementEdit);
            flexDiv.appendChild(iElementDelete);
            cardDiv.appendChild(descP);
            cardDiv.appendChild(flexDiv);
            collapseDiv.appendChild(cardDiv);
            mDiv.appendChild(collapseDiv);
            secondRowDiv.appendChild(mDiv);

            task.appendChild(rowDiv);
            task.appendChild(secondRowDiv);

            documentFragment = document.createDocumentFragment();
            return (documentFragment.appendChild(task));

        }

        //document.querySelector('#task-container').innerHTML = '';

        for (params of paramsArr) {
            document.querySelector('#task-container').appendChild(createTask(params));
        }
    </script>


    <script>
        window.onload = function() {
            bootlint.showLintReportForCurrentDocument([], {
                hasProblems: false,
                problemFree: false
            });

            $('[data-toggle="tooltip"]').tooltip();

            function formatDate(date) {
                return (
                    date.getDate() +
                    "/" +
                    (date.getMonth() + 1) +
                    "/" +
                    date.getFullYear()
                );
            }

            var currentDate = formatDate(new Date());

            $("#setDate").datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true,
                startDate: currentDate,
                minDate: currentDate,
                maxViewMode: 2
            });

            $("#setDate").on("click", function(event) {
                $("#setDate").datepicker("show")
                    .on("changeDate", function(dateChangeEvent) {
                        $("#setDate").datepicker("hide");
                        $("#setDate").text(formatDate(dateChangeEvent.date));
                    });
            });
        };
    </script>
</body>

</html>