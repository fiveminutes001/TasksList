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

        .add-todo-input,
        .edit-todo-input {
            outline: none;
        }

        .add-todo-input:focus,
        .edit-todo-input:focus {
            border: none !important;
            box-shadow: none !important;
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

        <!-- Create todo section -->
        <div class="row m-1 p-3">
            <div class="col mx-auto">
                <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                    <div class="col p-0 m-0">
                        <input class="form-control form-control-lg border-0 p-1 add-todo-input bg-transparent rounded" type="text" placeholder="Task name">
                    </div>
                    <div class="m-0 px-2 d-flex align-items-center">
                        <label class="text-secondary my-2 p-0 px-1 view-opt-label due-date-label d-none">Due date not set</label>
                        <i class="fa fa-calendar my-2 px-1 text-primary btn due-date-button" data-toggle="tooltip" data-placement="bottom" title="Set a Due date"></i>
                        <i class="fa fa-calendar-times-o my-2 px-1 text-danger btn clear-due-date-button d-none" data-toggle="tooltip" data-placement="bottom" title="Clear Due date"></i>
                    </div>
                    <div class="px-0 mx-0 mr-2">
                        <button type="button" class="btn btn-primary">Add</button>
                    </div>
                </div>
                <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">details</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- View options section -->
        <div class="row m-1 justify-content-end">
            <div class="col-6 d-flex align-items-center">
                <label class="text-secondary my-2 pr-2 view-opt-label">Filter</label>
                <select class="custom-select custom-select-sm btn my-2">
                    <option value="all" selected>All</option>
                    <option value="completed">Completed</option>
                    <option value="active">Active</option>
                    <option value="has-due-date">Has due date</option>
                </select>
            </div>

            <div class="col-6 d-flex align-items-center px-1 pr-3">
                <label class="text-secondary my-2 pr-2 view-opt-label">Sort</label>
                <select class="custom-select custom-select-sm btn my-2">
                    <option value="added-date-asc" selected>Added date</option>
                    <option value="due-date-desc">Due date</option>
                </select>
                <i class="fa fa fa-sort-amount-asc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom" title="Ascending"></i>
                <i class="fa fa fa-sort-amount-desc text-info btn mx-0 px-0 pl-1 d-none" data-toggle="tooltip" data-placement="bottom" title="Descending"></i>
            </div>
        </div>

        <!-- Todo list section -->
        <div class="row mx-1 pb-3 w-80">
            <div class="col mx-auto">
                <!-- Todo Item 2 -->
                <div>
                    <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Button with data-target
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-12 m-0 p-0">
                                    <p>details details details details details details details details details details details details details </p>
                                    <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                                    <label class="date-label my-2 text-black-50">28th Jun 2020</label>
                                    <i class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
                                    <i class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Delete todo"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Todo Item 3 -->
                <div>
                    <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                            Button with data-target
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample2">
                        <div class="card card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                    </div>
                </div>
                <!-- Todo Item 4 -->
                <div>
                    <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                            Button with data-target
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample3">
                        <div class="card card-body">
                            <div class="row px-3 align-items-center todo-item rounded">
                                <div class="col-12 p-0 d-flex align-items-center">
                                    <i class="fa fa-square-o text-primary btn m-0 p-0 d-none" data-toggle="tooltip" data-placement="bottom" title="Mark as complete"></i>
                                    <i class="fa fa-check-square-o text-primary btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Mark as todo"></i>
                                    <input type="text" class="form-control form-control-lg border-0 bg-transparent rounded px-3" value="Buy groceries for next week" title="Buy groceries for next week" />
                                </div>

                                <div class="col-12 m-0 p-0 todo-actions">
                                    <p>details details details details details details details details details details details details details </p>
                                    <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                                    <label class="date-label my-2 text-black-50">28th Jun 2020</label>
                                    <i class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
                                    <i class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Delete todo"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
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

            $(".due-date-button").datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true,
                startDate: currentDate,
                orientation: "bottom right"
            });

            $(".due-date-button").on("click", function(event) {
                $(".due-date-button")
                    .datepicker("show")
                    .on("changeDate", function(dateChangeEvent) {
                        $(".due-date-button").datepicker("hide");
                        $(".due-date-label").text(formatDate(dateChangeEvent.date));
                    });
            });
        };
    </script>
</body>

</html>