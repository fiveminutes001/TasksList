<?php
class insert_query
{
	// property declaration
	public $column;
	public $column_title;
	public $result;
	public $results_array = [];
	public $sql;
	public $q;
	public $data;

	public function __construct($column, $con, $q, $data = null, $column_two = null, $column_three = null)
	{
		$this->column = $column;
		$this->q = $q;
		$this->data = $data;
		$this->con = $con;

		$single_column_sql = 'SELECT * FROM tasks';
		$two_column_sql = 'SELECT username FROM playground_demo_all_data WHERE ' . $column . " LIKE '" . $q . "%' AND " . $column_two . " LIKE '" . $q . "%' LIMIT 5";
		$three_column_sql = 'SELECT username FROM playground_demo_all_data WHERE ' . $column . " LIKE '" . $q . "%' AND " . $column_two . " LIKE '" . $q . "%' AND " . $column_three . " LIKE '" . $q . "%' LIMIT 5";

		$this->sql = $column && $column_two && $column_three ? $three_column_sql : ($column && $column_two ? $two_column_sql : $single_column_sql);
		$this->column_title = $column && $column_two && $column_three ? $column . ' and ' . $column_two . ' and ' . $column_three . ' columns.' : ($column && $column_two ? $column . ' and ' . $column_two . ' columns.' : $column . ' column.');
	}

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
class search_query
{
	// property declaration
	public $column;
	public $column_title;
	public $result;
	public $results_array = [];
	public $sql;
	public $q;
	public $data;

	public function __construct($column, $con, $q, $data = null, $column_two = null, $column_three = null)
	{
		$this->column = $column;
		$this->q = $q;
		$this->data = $data;
		$this->con = $con;

		$single_column_sql = 'SELECT * FROM tasks';
		$two_column_sql = 'SELECT username FROM playground_demo_all_data WHERE ' . $column . " LIKE '" . $q . "%' AND " . $column_two . " LIKE '" . $q . "%' LIMIT 5";
		$three_column_sql = 'SELECT username FROM playground_demo_all_data WHERE ' . $column . " LIKE '" . $q . "%' AND " . $column_two . " LIKE '" . $q . "%' AND " . $column_three . " LIKE '" . $q . "%' LIMIT 5";

		$this->sql = $column && $column_two && $column_three ? $three_column_sql : ($column && $column_two ? $two_column_sql : $single_column_sql);
		$this->column_title = $column && $column_two && $column_three ? $column . ' and ' . $column_two . ' and ' . $column_three . ' columns.' : ($column && $column_two ? $column . ' and ' . $column_two . ' columns.' : $column . ' column.');
	}

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

//top five results array, local and overall, and response
$response = '';

if ($q == 1) {
	$new_search = new search_query('full_name', $con, $q, $data);
	$query_result = $new_search->return_results();
} else {
	$query_result = json_decode($data);
}

$response = json_encode($query_result);
