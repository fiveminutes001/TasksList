<?php
//SESSION START
session_start();

//ERRORS DISPLAY
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//GET FUNCTION TO GET DB DETAILS FROM FAR FILE//OUTPUT 00
include 'php/connect.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta charset="UTF-8" />

		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&amp;display=swap" rel="stylesheet" />
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/body.css" />
		<link rel="stylesheet" href="css/formBox.css" />
    
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootlint/1.1.0/bootlint.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
			<form class="new-task-form" novalidate>
				<div class="row m-1 p-3">
					<div class="col mx-auto">
						<!-- Set task name-->
						<div class="row bg-white rounded shadow-sm pb-0 pt-2 pr-2 pl-2 add-todo-wrapper align-items-center justify-content-center">
							<div class="col-12 m-0 mt-2 text-left">
								<label class="date-label my-2 text-black-50" id="section-header"><u>Add new</u></label>
							</div>
							<div class="col-12 col-sm-6 col-md-8 p-0 m-0 mt-2">
								<div class="form-group">
									<input class="form-control form-control-lg p-1 add-todo-input bg-transparent text-center rounded" type="text" placeholder="Task name" required id="new-task-name" />
									<div class="valid-feedback">
      									Looks good!
    								</div>
									<div class="invalid-feedback">
       									Please choose a Task name.
      								</div>
								</div>
							</div>
							<!-- Set due date -->
							<div class="col-12 col-sm-6 col-md-4 p-0 m-0 mt-2">
								<div class="form-group">
									<input id="new-task-due-date" class="form-control form-control-lg p-1 add-todo-input bg-transparent text-center rounded" type="text" placeholder="Due date" required />
								</div>
							</div>
						</div>
						<!-- Set details -->
						<div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">details</span>
								</div>

								<textarea class="form-control" aria-label="With textarea" id="new-task-details"></textarea>
							</div>
						</div>
						<!-- Submit -->
						<div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-end">
							<div class="px-0 mx-0 mr-2">
								<button id="add-new-task-button" type="submit" class="btn btn-primary">Add</button>
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
					<select class="custom-select custom-select-sm my-2" id="task-filter">
						<option value="all" selected>All</option>
						<option value="completed">Completed</option>
						<option value="active">Active</option>
					</select>
					<div class="icon text-center">
						<i class="fa fa fa-filter text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom"></i>
					</div>
				</div>

				<!--Sort-->
				<div class="col-12 col-sm-6 align-items-center d-flex justify-content-between">
					<label class="label text-secondary my-2 pr-2 view-opt-label">Sort</label>
					<select class="custom-select custom-select-sm my-2" id="task-sort">
						<option value="added-date-desc" selected>Added date</option>
						<option value="due-date-desc">Due date</option>
						<option value="task-details-desc">Details</option>
						<option value="task-status-desc">Status</option>
					</select>
					<div class="icon text-center">
						<i id="ascending" class="fa fa fa-sort-amount-asc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom" title="Ascending"></i>
					</div>
				</div>

				<!--Results-->
				<div class="col-12 m-0 text-left">
					<label class="date-label my-2 text-black-50">Total 4 tasks, 4 completed, 0 left</label>
				</div>
			</div>

			<!-- Todo list section -->
			<div class="row mx-1 pb-3 w-80" id="task-container"></div>

			<!-- Todo Template -->
			<template>
				<div class="col-12 col-sm-6 m-0" id="task-0">
					<div class="row task-button">
						<div class="col-12 m-0 p-1 pb-0">
							<p class="m-1">
								<!-- prettier-ignore -->
								<button class="btn btn-primary w-100" id="task-0-button" type="button" data-toggle="collapse" data-target="#collapseToDo0" aria-expanded="true" aria-controls="collapseToDo0">
									Task name
								</button>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="m-0 w-100">
							<div class="collapse show" id="collapseToDo0">
								<div class="card card-body ml-2 mr-2 mt-0 mb-3 pt-2 pb-1 bg-light">
									<form class="is-readonly">
										<div class="form-group">
											<label for="task-0-name">Task Name</label>
											<input type="text" class="form-control is-disabled" id="task-0-name" placeholder="Name" value="Task Name" disabled />
										</div>
										<div class="form-group">
											<label for="task-0-due-date">Due Date</label>
											<input type="text" class="form-control is-disabled" id="task-0-due-date" placeholder="Due date" disabled />
										</div>
										<div class="form-group">
											<label for="task-0-details">Details</label>
											<textarea class="form-control is-disabled" aria-label="With textarea" id="task-0-details" placeholder="Task Details" disabled></textarea>
										</div>
										<div class="form-group">
											<label class="mr-sm-2" for="task-0-status-select">Status</label>
											<select class="custom-select mr-sm-2 form-control is-disabled" id="task-0-status-select" disabled>
												<option value="1" selected>Completed</option>
												<option value="2">Not finished</option>
											</select>
										</div>
										<div class="text-center">
											<button id="edit-task-0" type="button" class="btn btn-default btn-edit js-edit">Edit</button>
											<button id="save-task-0" type="button" class="btn btn-default btn-save js-save">Save</button>
											<button id="delete-task-0" task-id="0" type="button" class="btn btn-default btn-save js-save delete-task-btn">Delete</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</template>
		</div>
        
        <script>console.log('db connection: ' + <?= json_encode($connection_status) ?>);</script>
		<script type="module" src="main.js"></script>
	</body>
</html>
