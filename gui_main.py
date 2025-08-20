import tkinter as tk
from tkinter import messagebox
from mailer import send_phishing_email

def send_email():
    scenario = scenario_var.get()
    email = email_entry.get().strip()
    if not scenario or not email:
        messagebox.showwarning("Eksik Bilgi", "Lütfen senaryo ve e-posta adresi girin.")
        return
    send_phishing_email(scenario, email)
    messagebox.showinfo("Başarılı", f"{scenario} senaryosu {email} adresine gönderildi.")

root = tk.Tk()
root.title("Phishing Paneli")
root.configure(bg="#0f0f0f")
root.geometry("480x400")

scenario_var = tk.StringVar()

tk.Label(root, text="💀 HexHook 💀", fg="#00ff00", bg="#0f0f0f", font=("Courier New", 20, "bold")).pack(pady=15)

scenarios = ["Facebook", "Instagram", "Twitter", "ÖBS", "Sandova", "Nova"]
for s in scenarios:
    tk.Radiobutton(root, text=s, variable=scenario_var, value=s,
                   fg="#00ff00", bg="#0f0f0f", selectcolor="#0f0f0f",
                   font=("Courier New", 11), activeforeground="#00ff00", activebackground="#0f0f0f").pack(anchor="w", padx=30)

tk.Label(root, text="🎯 Hedef E-Posta Adresi:", fg="#00ff00", bg="#0f0f0f", font=("Courier New", 11)).pack(pady=(20, 5))
email_entry = tk.Entry(root, font=("Courier New", 11), width=35, bg="#1a1a1a", fg="#00ff00", insertbackground="#00ff00")
email_entry.pack()

tk.Button(root, text="🚀 E-Postayı Gönder 🚀", command=send_email,
          bg="#1f1f1f", fg="#00ff00", font=("Courier New", 11, "bold"),
          activebackground="#2a2a2a", activeforeground="#00ff00").pack(pady=25)

root.mainloop()
