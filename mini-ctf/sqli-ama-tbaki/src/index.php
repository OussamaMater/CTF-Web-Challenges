<?php
error_reporting(0);

if (preg_match("/\_/i", $_SERVER["QUERY_STRING"])) {
	die();
}

include "conn.php";
$conn = mysqli_connect($host, $dbuser, $dbpass);

if (!$conn) {
	echo "Failed to connect to MySQL: " . mysqli_error();
}

mysqli_select_db($conn, $dbname) or die("Unable to connect to the database: $dbname");

foreach ($_GET as $value => $key) {
	$sql = "SELECT * FROM words WHERE id=('$value') LIMIT 0,1";
	echo $sql . "\n";
	$result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Title :)</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="dark dark:bg-gray-900">
	<h1 class="text-2xl text-white text-center mt-5">Maybe pass some args?</h1>
	<div class="overflow-x-auto relative shadow-md sm:rounded-lg m-10">
		<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
			<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
				<tr>
					<th scope="col" class="py-3 px-6 text-center">
						Query
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($_GET as $value => $key) : ?>
					<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
						<th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
							<pre>SELECT * FROM words WHERE id=('<?= $value; ?>') LIMIT 0,1</pre>
						</th>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

</body>

</html>