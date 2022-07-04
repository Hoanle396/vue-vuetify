<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
// ***********  connect to the mysql database, provide the appropriate credentials
$conn = mysqli_connect('localhost', 'root', '', 'lab');
mysqli_set_charset($conn, 'utf8');

$input = json_decode(file_get_contents('php://input'), true);  // json string to associative array(true)

if (isset($_POST)) {
	$table = "users";

	// retrieve the data to prepare set values
	if (isset($input)) {
		$columns = preg_replace('/[^a-z0-9_]+/i', '', array_keys($input));
		$values = array_map(function ($value) use ($conn) {
			if ($value === null) return null;
			return mysqli_real_escape_string($conn, (string)$value);
		}, array_values($input));
	}

	$sql = "select * from `$table` WHERE username='" . $input['username'] . "' and password ='" . $input['password'] . "'";

	// execute SQL statement
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo json_encode(mysqli_fetch_object($result));
	}

	// close mysql connection
	mysqli_close($conn);
}
