<?php


$servername = "localhost";
$username = "Munkh";
$password = "12345678";
$dbname = "drhome_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





$sql = "SELECT * FROM branch";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($rows);
} else {
    
    header('Content-Type: application/json');
    echo json_encode([]);
}


$conn->close();

?>
