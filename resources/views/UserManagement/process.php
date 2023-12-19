<?php
// Handle form submission and database connection here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $employee_id = $_POST["employee_id"];
    $department = $_POST["department"];
    $roles = $_POST["roles"];
    $mobile = $_POST["mobile"];
    $description = $_POST["description"];
    $login_name = $_POST["login_name"];
    $password = $_POST["password"];
    $retype_password = $_POST["retype_password"];

    // Validate password and retype_password
    if ($password != $retype_password) {
        die("Password and Retype Password do not match.");
    }

    // Perform database connection and insertion here
    // For example, using MySQLi:
    $conn = new mysqli("localhost", "root", "", "wad_tubes");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nama, employee_id, department, roles, mobile, description, login_name, password)
            VALUES ('$nama', '$employee_id', '$department', '$roles', '$mobile', '$description', '$login_name', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "User added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
