<?php


$servername = "localhost";
$username = "Munkh";
$password = "12345678";
$dbname = "drhome_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





$sql = "SELECT s.sno, s.fullname, s.lastname, s.address, s.tel_no, s.position, s.sex, s.dob, s.salary, s.nin, s.bno,b.city FROM staff s join branch b on b.bno=s.bno"; //салбарт харъяалагдах ажилчидийн бүх мэдээлэл ,салбар аль хотод байрлах
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<style>';
    echo 'table {';
    echo '    font-family: Arial, sans-serif;';
    echo '    border-collapse: collapse;';
    echo '    width: 100%;';
    echo '}';
    echo 'th, td {';
    echo '    border: 1px solid #dddddd;';
    echo '    text-align: left;';
    echo '    padding: 8px;';
    echo '}';
    echo 'th {';
    echo '    background-color: #f2f2f2;';
    echo '}';
    echo '</style>';
    echo '</head>';
    echo '<body>';

    echo '<table>';
    echo '<tr>';
    echo '<th>S.No</th>';
    echo '<th>Full Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Address</th>';
    echo '<th>Tel. No</th>';
    echo '<th>Position</th>';
    echo '<th>Sex</th>';
    echo '<th>Date of Birth</th>';
    echo '<th>Salary</th>';
    echo '<th>NIN</th>';
    echo '<th>Branch No</th>';
    echo '<th>City</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['sno'] . '</td>';
        echo '<td>' . $row['fullname'] . '</td>';
        echo '<td>' . $row['lastname'] . '</td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['tel_no'] . '</td>';
        echo '<td>' . $row['position'] . '</td>';
        echo '<td>' . $row['sex'] . '</td>';
        echo '<td>' . $row['dob'] . '</td>';
        echo '<td>' . $row['salary'] . '</td>';
        echo '<td>' . $row['nin'] . '</td>';
        echo '<td>' . $row['bno'] . '</td>';
        echo '<td>' . $row['city'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</body>';
    echo '</html>';
} else {
    echo 'No records found.';
}

$conn->close();

?>
