<html>
<head>
    <title>DB CONNECTIVITY PROGRAM</title>
</head>
<body>

<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "empdetails";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully<br/>";
}

// SQL query
$sql = "INSERT INTO employee VALUES (1, 'Lokeshwar', 'CSE', '2004-10-01', 5000)";

// Execute query and check for success
if ($conn->query($sql) === TRUE) {
    echo "Row inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>

</body>
</html>
