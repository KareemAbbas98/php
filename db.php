<?php


$call = mysqli_connect("localhost" , "root" , "");
if ($call->connect_error) {
    die("Connection failed: ". $call->connect_error);}
echo "Connected successfully";



$sql = "CREATE DATABASE sb1";
if ($call->query($sql) === TRUE) {
    echo "Database created successfully";}
else { echo "Error creating database: " . $call->error;}


$conn = new mysqli('localhost', 'root', '', 'sb1');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE student (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
age VARCHAR(30) NOT NULL,
email VARCHAR(50),
address VARCHAR(50),
gender VARCHAR(50),

reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table student created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>