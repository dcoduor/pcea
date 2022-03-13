<?php  
$servername = "localhost";
$username = "greenso1_porter";
$password = "Qj9hj_S@net4";
$database = "greenso1_portal_org";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>