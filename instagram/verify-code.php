<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userCode = $_POST["code"];
    $correctCode = $_SESSION["reset_code"] ?? null;

    if ($userCode === $correctCode) {
        // Kod doğruysa şifre yenileme sayfasına yönlendir
        header("Location: reset-password.html");
        exit();
    } else {
        // Yanlışsa tekrar kod girişine yönlendir
        header("Location: verify-code.html?error=invalid");
        exit();
    }
} else {
    // Direkt giriş yapılırsa kod ekranına yönlendir
    header("Location: verify-code.html");
    exit();
}
?>
