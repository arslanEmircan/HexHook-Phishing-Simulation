from mailer import send_phishing_email

def show_menu():
    options = {
        "1": "Facebook",
        "2": "Instagram",
        "3": "Twitter",
        "4": "ÖBS",
        "5": "Sandova",
        "6": "Nova"
    }

    print("Phishing Senaryoları:")
    for key, value in options.items():
        print(f"{key}. {value}")

    choice = input("Bir senaryo seçin (1-6): ").strip()

    if choice in options:
        send_phishing_email(options[choice])
    else:
        print("Geçersiz seçim!")

if __name__ == "__main__":
    show_menu()
