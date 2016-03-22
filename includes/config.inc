
<?php

$hostname = 'localhost';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT 						necessary to change this even this script has already online on the internet.
$dbname   = 'contacts'; // Your database name.
$username = 'root';             // Your database username.
$password = 'toor';                 // Your database password. If your database has no password, leave it empty.


   // Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>
