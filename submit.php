<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "diet_control"; // Your database name

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $goal = $_POST['goal'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the table
    $sql = "INSERT INTO registrations (name, email, age, goal, submission_date) 
            VALUES ('$name', '$email', '$age', '$goal', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Registration Successful!</h3>
              <p><strong>Name:</strong> $name</p>
              <p><strong>Email:</strong> $email</p>
              <p><strong>Age:</strong> $age</p>
              <p><strong>Diet Goal:</strong> $goal</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
