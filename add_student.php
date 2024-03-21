<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'students');
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



$name = $_POST['name'];
$gender = $_POST['gender'];
$standard = $_POST['standard'];
$dob = $_POST['dob'];
$father_name = $_POST['father_name'];
$father_mobile = $_POST['father_mobile'];

$birthdate = new DateTime($dob);
$today = new DateTime();
$age = $birthdate->diff($today)->y;


$sql = "INSERT INTO students (name, gender, standard, dob, age, father_name, father_mobile)
VALUES ('$name', '$gender', '$standard', '$dob', '$age', '$father_name', '$father_mobile')";

if ($conn->query($sql) === TRUE) {
  
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['standard']."</td>";
            echo "<td>".$row['dob']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['father_name']."</td>";
            echo "<td>".$row['father_mobile']."</td>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
