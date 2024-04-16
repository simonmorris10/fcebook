<?php
// Create the variable
$serverName = "localhost";
$dbuserName = "root";
$dbpassword = "";
$dbname = "test";

//Creat connection
$conn = new mysqli ($serverName, $dbuserName, $dbpassword, $dbname);

//Check connection
if ($conn->connect_error){
    die ("Connection failed: " . $conn->connect_error);
}

//Bind the parameters and statements
$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("INSERT INTO facebook(email, password) values(?,?)");
$stmt->bind_param("ss", $email, $password);

//Check execuation
if ($stmt->execute() === TRUE){
        echo "Record inserted successfully!";
        
}else{
    echo "Failed: " . $stmt->connect_error;
}

$stmt->close();
$conn->close();

?>