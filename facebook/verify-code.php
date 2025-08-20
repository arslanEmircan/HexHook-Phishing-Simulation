<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userCode = $_POST["code"];
    $correctCode = $_SESSION['reset_code'] ?? null;

    if ($userCode === $correctCode) {
        // Kod doğruysa yönlendir
        header("Location: reset-password.html");
        exit();
    } else {
        // Kod yanlışsa tekrar doğrulama sayfasına hata mesajı ile dön
        echo "<script>
                alert('Girilen kod yanlış. Lütfen tekrar deneyin.');
                window.location.href = 'verify-code.html';
              </script>";
        exit();
    }
} else {
    header("Location: verify-code.html");
    exit();
}
