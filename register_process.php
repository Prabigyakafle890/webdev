<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "pk_webtech";
$con = mysqli_connect($host, $user, $pass, $dbName);

if (!$con) {
    die("Failed to connect to database: " . mysqli_connect_error());
} else {
    echo "Database connection success<br>";
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    // Insert data into database
    $sql = "INSERT INTO students (name, phone, address, email) VALUES ('$name', '$phone', '$address', '$email')";
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Delete record if delete button is clicked
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $delete_sql = "DELETE FROM students WHERE id = $delete_id";
    if (mysqli_query($con, $delete_sql)) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

// Fetch all records from the students table
$sql_fetch = "SELECT * FROM students";
$result = mysqli_query($con, $sql_fetch);

if ($result) {
    echo "<h2>Registered Students</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Phone</th><th>Address</th><th>Email</th><th>Action</th></tr>";

    // Check if there are any rows to fetch
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td><a href='register_process.php?delete_id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No records found</td></tr>";
    }

    echo "</table>";
} else {
    echo "Error retrieving data: " . mysqli_error($con);
}

// Close database connection
mysqli_close($con);
?>
