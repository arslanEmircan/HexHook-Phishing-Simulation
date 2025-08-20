<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

session_start();

$email = $_POST['mail'] ?? null;
if (!$email) {
    echo json_encode(['success' => false, 'message' => 'E-posta adresi zorunlu.']);
    exit();
}

$codes = ['1384', '1325', '5942', '4821', '8713'];
$selected_code = $codes[array_rand($codes)];

$_SESSION['discount_mail'] = $email;
$_SESSION['discount_code'] = $selected_code;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'mersaulttest@gmail.com';
    $mail->Password   = 'amctlbmxforudhti';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('mersaulttest@gmail.com', 'Sandova Retreat');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Sandova Retreat İndirim Kodunuz';
    $mail->Body = "
        <html>
        <head><meta charset='UTF-8'></head>
        <body>
            <h3 style='color:#a87c4f;'>Sandova Retreat %40 İndirim Kodunuz:</h3>
            <p style='font-size: 24px; font-weight: bold;'>$selected_code</p>
            <p>Kodu ödeme ekranında ilgili alana girerek %40 indirim hakkınızı kullanabilirsiniz.</p>
        </body>
        </html>
    ";

    $mail->send();
    echo json_encode(['success' => true, 'message' => 'Kod gönderildi!']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Mail gönderilemedi: '.$mail->ErrorInfo]);
}
?>
