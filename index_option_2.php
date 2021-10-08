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
                            <label class="date-label my-2 text-black-50"><u>Add new</u></label>
                        </div>
                        <div class="col-12 col-sm-9 p-0 m-0 mt-2">
                            <input class="form-control form-control-lg p-1 add-todo-input bg-transparent text-center rounded" type="text" placeholder="Task name" required>
                        </div>
                        <div class="col-12 col-sm-3 p-0 m-0 mt-2">
                            <input id="setDate" class="form-control form-control-lg p-1 add-todo-input bg-transparent text-center rounded" type="text" placeholder="Due date" required>
                        </div>
                    </div>
                    <!-- Set details -->
                    <div class="row bg-white rounded shadow-sm p-2  add-todo-wrapper align-items-center justify-content-center">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">details</span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
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
        <div class="row mx-1 pb-3 w-80">

            <!-- Todo Item 1 -->
            <div class="col-12 col-sm-6 m-0">
                <div class="row">
                    <div class="col-12 m-0 p-1 pb-0">
                        <p class="m-1">
                            <button class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Button with data-target
                            </button>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="m-0">
                        <div class="collapse" id="collapseExample">

                            <div class="card card-body ml-2 mr-2 mt-0 mb-3 pt-2 pb-1">
                                <p>details details details details details details details details details details details details details </p>
                                <div class="d-flex flex-row align-items-baseline">
                                    <i class="fa fa-info-circle my-2 text-black-50 m-2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                                    <label class="date-label my-2 text-black-50 m-2">28th Jun 2020</label>
                                    <i class="fa fa-pencil text-info m-2 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
                                    <i class="fa fa-trash-o text-danger m-2 p-0" data-toggle="tooltip" data-placement="bottom" title="Delete todo"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Todo Item 2 -->
            <div class="col-12 col-sm-6 m-0" id="task2">
                <div class="row">
                    <div class="col-12 m-0 p-1 pb-0">
                        <p class="m-1">
                            <button class="task-name" class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                Button with data-target
                            </button>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="m-0">
                        <div class="collapse" id="collapseExample2">

                            <div class="card card-body ml-2 mr-2 mt-0 mb-3 pt-2 pb-1 task-details">
                                <p>details details details details details details details details details details details details details </p>
                                <div class="d-flex flex-row align-items-baseline">
                                    <i class="fa fa-info-circle my-2 text-black-50 m-2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                                    <label class="date-label my-2 text-black-50 m-2 task-creation-date">28th Jun 2020</label>
                                    <i class="fa fa-pencil text-info m-2 p-0 task-edit" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
                                    <i class="fa fa-trash-o text-danger m-2 p-0 task-delete" data-toggle="tooltip" data-placement="bottom" title="Delete todo"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Todo Item 3 -->
            <div class="col-12 col-sm-6 m-0">
                <div class="row">
                    <div class="col-12 m-0 p-1 pb-0">
                        <p class="m-1">
                            <button class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                                Button with data-target
                            </button>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="m-0">
                        <div class="collapse" id="collapseExample3">

                            <div class="card card-body ml-2 mr-2 mt-0 mb-3 pt-2 pb-1">
                                <p>details details details details details details details details details details details details details </p>
                                <div class="d-flex flex-row align-items-baseline">
                                    <i class="fa fa-info-circle my-2 text-black-50 m-2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                                    <label class="date-label my-2 text-black-50 m-2">28th Jun 2020</label>
                                    <i class="fa fa-pencil text-info m-2 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
                                    <i class="fa fa-trash-o text-danger m-2 p-0" data-toggle="tooltip" data-placement="bottom" title="Delete todo"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-1 pb-3 w-80" id="tasks-div"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootlint/1.1.0/bootlint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

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