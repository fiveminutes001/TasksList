<?php
class query
{
	public function query_results()
	{
		$this->result = mysqli_query($this->con, $this->sql);
		return $this;
	}

	public function query_results_to_array()
	{
		while ($row = mysqli_fetch_array($this->result)) {
			array_push($this->results_array, $row);
		}

		return $this->results_array;
	}

	public function return_results()
	{
		$result = $this->query_results()->query_results_to_array();
		return $result;
	}
}
class sort_query extends query
{
	public $column;
	public $result;
	public $results_array = [];
	public $sql;

	public function __construct($column, $con)
	{
		$this->column = $column;
		$this->con = $con;
		$this->sql = 'SELECT * FROM tasks WHERE taskDeleted != 0 ORDER BY ' . $column . ' DESC';
	}
}

class update_query extends query
{
	public $column;
	public $result;
	public $results_array = [];
	public $sql;

	public function __construct($column, $con, $data)
	{
		$this->column = $column;
		$this->con = $con;
		$this->sql = 'SELECT * FROM tasks WHERE taskDeleted != 0 ORDER BY ' . $column . ' DESC';
	}
}

class total_query extends query
{
	public $column;
	public $result;
	public $results_array = [];
	public $sql;

	public function __construct($con)
	{
		$this->con = $con;
		$this->sql = 'SELECT * FROM tasks';
	}

	public function return_results()
	{
		$result = count($this->query_results()->query_results_to_array());
		return $result;
	}
}

$response = '';

switch ($q) {
	case 0:
		$data = json_decode($data);
		$new_search = new update_query('taskId', $con, $data);
		$query_result = $new_search->return_results();
		break;
	case 1:
		$new_search = new sort_query('taskId', $con);
		$query_result = $new_search->return_results();
		break;
	case 2:
		// $new_search = new filter_query('taskId', $con, $data);
		// $query_result = $new_search->return_results();
		break;
	case 3:
		$new_search = new total_query($con);
		$query_result = $new_search->return_results();
		break;
}

$response = json_encode($query_result);
