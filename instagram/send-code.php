<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

session_start();

// Kullanıcıdan e-posta al
$email = $_POST['email'] ?? 'bilinmiyor';

// Kod havuzundan rastgele bir doğrulama kodu seç
$codes = ['1842', '2973', '3305', '4629', '5581'];
$selected_code = $codes[array_rand($codes)];

// Session'a e-posta ve kodu kaydet
$_SESSION['reset_email'] = $email;
$_SESSION['reset_code'] = $selected_code;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'mersaulttest@gmail.com';
    $mail->Password   = 'amctlbmxforudhti';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('mersaulttest@gmail.com', 'Instagram Destek');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8'; // 🔥 Türkçe karakterler için önemli
    $mail->Subject = 'Instagram Şifre Sıfırlama Kodu';
    $mail->Body = "
        <html>
        <head>
            <meta charset='UTF-8'>
        </head>
        <body>
            <h3 style='color:#e1306c;'>Şifre sıfırlama talebiniz için doğrulama kodunuz:</h3>
            <p style='font-size: 24px; font-weight: bold;'>$selected_code</p>
            <p>Kodu doğrulama sayfasında girerek devam edebilirsiniz.</p>
        </body>
        </html>
    ";

    $mail->send();

    // Kod gönderildiyse yönlendirme
    header("Location: verify-code.html");
    exit();
} catch (Exception $e) {
    echo "Mail gönderilemedi: {$mail->ErrorInfo}";
}
?>
