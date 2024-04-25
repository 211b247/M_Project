<?php
$servername = "localhost";
$username = "root"; // Your MySQL username (default is root)
$password = ""; // Your MySQL password (default is empty)
$dbname = "employee2"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to insert data into the database
$stmt = $conn->prepare("INSERT INTO orders (food_name, food_price, quantity, total_price, customer_name, customer_email, customer_phone, customer_address) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters with form values
$stmt->bind_param("ssidsiss", $_POST['foodName'], $_POST['foodPrice'], $_POST['quantity'], $_POST['totalPrice'], $_POST['customerName'], $_POST['customerEmail'], $_POST['customerPhone'], $_POST['customerAddress']);

// Execute the statement
if ($stmt->execute()) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
