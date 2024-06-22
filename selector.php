<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "pk_webtech";
$con = mysqli_connect($host, $user, $pass, $dbName);

if (!$con) {
    echo "Failed to connect to database";
    die();
} else {
    echo "Database connection success";
}

$sql = "SELECT * FROM students";
$result = mysqli_query($con, $sql);

if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Address</th></tr>"; // Add table headers

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error executing query: " . mysqli_error($con);
}

mysqli_close($con);
?>
