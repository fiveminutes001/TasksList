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
	public $dev;

	public function __construct($column, $con, $q, $dev = null, $column_two = null, $column_three = null)
	{
		$this->column = $column;
		$this->q = $q;
		$this->dev = $dev;
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
	public $dev;

	public function __construct($column, $con, $q, $dev = null, $column_two = null, $column_three = null)
	{
		$this->column = $column;
		$this->q = $q;
		$this->dev = $dev;
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

// //triple columns functions
// //full_name and mail and username
// $full_name_and_mail_and_username = new query('full_name', $con, $q, $dev, 'mail', 'username');
// $top_five_results_array_overall = return_top_five_results_array_overall($dev, $full_name_and_mail_and_username, $top_five_results_array_overall);

// //double columns functions
// //full_name and mail
// $full_name_and_mail = new query('full_name', $con, $q, $dev, 'mail');
// $top_five_results_array_overall = return_top_five_results_array_overall($dev, $full_name_and_mail, $top_five_results_array_overall);

// //full_name and username
// $full_name_and_username = new query('full_name', $con, $q, $dev, 'username');
// $top_five_results_array_overall = return_top_five_results_array_overall($dev, $full_name_and_username, $top_five_results_array_overall);

// //mail and username
// $mail_and_username = new query('mail', $con, $q, $dev, 'username');
// $top_five_results_array_overall = return_top_five_results_array_overall($dev, $mail_and_username, $top_five_results_array_overall);

//single columns functions
//full_name
if ($q == 1) {
	$new_search = new search_query('full_name', $con, $q, $dev);
	$query_result = $new_search->return_results();
} else {
	$query_result = 'data inserted successfully';
}
// //mail
// $mail = new query('mail', $con, $q, $dev);
// $top_five_results_array_overall = return_top_five_results_array_overall($dev, $mail, $top_five_results_array_overall);
// //username
// $username = new query('username', $con, $q, $dev);
// $top_five_results_array_overall = return_top_five_results_array_overall($dev, $username, $top_five_results_array_overall);
// //region
// $region = new query('region', $con, $q, $dev);
// $top_five_results_array_overall = return_top_five_results_array_overall($dev, $region, $top_five_results_array_overall);
// //department
// $department = new query('department', $con, $q, $dev);
// $top_five_results_array_overall = return_top_five_results_array_overall($dev, $department, $top_five_results_array_overall);

$response = json_encode($query_result);
