<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "africareg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
  
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $nationality = mysqli_real_escape_string($conn, $_POST["nationality"]);
    $academy = mysqli_real_escape_string($conn, $_POST["academy"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $country = mysqli_real_escape_string($conn, $_POST["country"]);

    // SQL query to insert data into the members table
    $sql = "INSERT INTO members (fname, lname, nationality,academy,email,country) VALUES ('$fname', '$lname', '$nationality','$academy', '$email', '$country')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        // You might consider redirecting to a confirmation page
        // header("Location: confirmation.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
