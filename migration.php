<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "flip_service_disburse";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create database
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();
// Create connection DB
$conn_db = new mysqli($servername, $username, $password, $dbname);
// Check connection DB
if ($conn_db->connect_error) {
    die("Connection failed: " . $conn_db->connect_error);
}
// sql to create table
$sql = "CREATE TABLE our_transaction (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
transaction_id VARCHAR(30) NOT NULL,
bank_code VARCHAR(30) NOT NULL,
account_number VARCHAR(50),
amount FLOAT(50),
remark TEXT,
status VARCHAR(25),
beneficiary_name VARCHAR(50),
receipt VARCHAR(255),
time_served DateTime,
fee FLOAT(50),
request TEXT,
response TEXT
)";

if ($conn_db->query($sql) === TRUE) {
    echo "Table our_transaction created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn_db->close();
?>
