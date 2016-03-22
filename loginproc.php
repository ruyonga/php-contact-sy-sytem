<?php

// Inialize session
session_start();

// Include database connection settings
include('includes/config.inc');
//protect from mysql injection

$myusername= $_POST['username'];
$mypassword= md5($_POST['password']);

echo $myusername;


//create a select query
$sql = "SELECT * FROM users WHERE username = '$myusername' && password = '$mypassword'";
$result = $conn->query($sql) or die($conn->error);

if ($result->num_rows > 0) {
    // start session
    $_SESSION['username'] = $_POST['username'];
    $row = mysqli_fetch_row($result);
    $_SESSION['user_id'] =  $row['id'];
    header('Location:addcontact.php?msg="Proceed to perform admin tasks"');

} else {

    header('Location:index.php?msg="Wrong username or password"');
}

?>

