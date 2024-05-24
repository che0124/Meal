<?php
$servername = "localhost";
$username = "root";
$password = "5253";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE company";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db("company");

// Create employee table
$sql = "CREATE TABLE employee (
    id CHAR(5) PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    salary INT(10) NOT NULL,
    sex CHAR(1) NOT NULL,
    dno INT(1) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table employee created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Create department table
$sql = "CREATE TABLE department (
    dname VARCHAR(30) NOT NULL,
    dnumber INT(1) PRIMARY KEY
)";

if ($conn->query($sql) === TRUE) {
    echo "Table department created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert data into employee table using prepared statements
$stmt = $conn->prepare("INSERT INTO employee (id, firstname, lastname, salary, sex, dno) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssisi", $id, $firstname, $lastname, $salary, $sex, $dno);

$employees = [
    ['S0001', 'Rick', 'Wang', 15000, 'M', 1],
    ['S0002', 'James', 'Chen', 20000, 'M', 2],
    ['S0003', 'Alice', 'Lee', 25000, 'F', 3],
    ['S0004', 'Selina', 'Chien', 28000, 'F', 1]
];

foreach ($employees as $employee) {
    [$id, $firstname, $lastname, $salary, $sex, $dno] = $employee;
    $stmt->execute();
}

$stmt->close();
echo "Data inserted into employee table successfully\n";

// Insert data into department table using prepared statements
$stmt = $conn->prepare("INSERT INTO department (dname, dnumber) VALUES (?, ?)");
$stmt->bind_param("si", $dname, $dnumber);

$departments = [
    ['Research', 1],
    ['Marketing', 2],
    ['Sales', 3]
];

foreach ($departments as $department) {
    [$dname, $dnumber] = $department;
    $stmt->execute();
}

$stmt->close();
echo "Data inserted into department table successfully\n";

$conn->close();
?>
