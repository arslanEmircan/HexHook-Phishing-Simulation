import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
import os
import unicodedata

def normalize_filename(name):
    name = unicodedata.normalize('NFKD', name).encode('ascii', 'ignore').decode('utf-8')
    return name.lower().replace(" ", "")

def send_phishing_email(scenario_name, receiver_email):
    sender_email = "mersaulttest@gmail.com"
    sender_password = "amctlbmxforudhti"  # Gmail uygulama şifresi

    file_name = normalize_filename(scenario_name) + ".com.html"
    file_path = os.path.join("templates", file_name)

    if not os.path.exists(file_path):
        print("HTML şablon bulunamadı:", file_path)
        return

    with open(file_path, "r", encoding="utf-8") as file:
        html_content = file.read()
        html_content = html_content.replace("{{email}}", receiver_email)

    message = MIMEMultipart("alternative")


    custom_subjects = {
        "ÖBS": "ÖBS Hesap Güvenliği - 2FA Etkinleştirme Hk.",
        "Instagram": "Instagram - Bilgilendirme",
        "Facebook": "Az önce Istanbul yakınında yeni bir cihazda giriş yaptınız mı?",
        "Twitter": "Twitter - Güvenlik Uyarısı",
        "Sandova": "Sandova Retreat - EmircanSoft Çalışanlarına %40 İndirimli Tatil Fırsatı",
        "Nova": "NovaDent - EmircanSoft Çalışanlarına %30 İndirimli Diş Sağlığı Fırsatı"
    }
    subject = custom_subjects.get(scenario_name, f"{scenario_name} - Bilgilendirme")
    message["Subject"] = subject


    fake_emails = {
        "Instagram": "destek@instagram.com",
        "Facebook": "security@facebookmail.com",
        "Twitter": "info@twitter.com",
        "ÖBS": "bim@ticaret.edu.tr",
        "Sandova": "EMIRCAN_IK@emircansoft.com",
        "Nova": "EMIRCAN_IK@emircansoft.com"
    }


    from_names = {
        "Instagram": "Instagram Destek",
        "Facebook": "Facebook",
        "Twitter": "Twitter Destek",
        "ÖBS": "Bilgi Teknolojileri Daire Başkanlığı",
        "Sandova": "EMIRCANSOFT_IK",
        "Nova": "EMIRCANSOFT_IK"
    }

    fake_from_email = fake_emails.get(scenario_name, sender_email)
    from_display_name = from_names.get(scenario_name, scenario_name)


    message["From"] = f"{from_display_name} <{fake_from_email}>"
    message["To"] = receiver_email

    message.attach(MIMEText(html_content, "html"))

    try:
        with smtplib.SMTP("smtp.gmail.com", 587) as server:
            server.starttls()
            server.login(sender_email, sender_password)
            server.sendmail(sender_email, receiver_email, message.as_string())
        print("E-posta gönderildi.")
    except Exception as e:
        print("E-posta gönderimi başarısız:", str(e))
