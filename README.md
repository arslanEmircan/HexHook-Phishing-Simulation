# HexHook — Phishing Simulation Tool 

> **Disclaimer:** This project was developed as part of my **Computer Engineering bachelor’s thesis**.  
> It is designed **only for educational and research purposes** to raise awareness about phishing and social engineering attacks.  
> It must **never** be used on real users or in unauthorized environments.

---

## Overview
HexHook is a **phishing simulation tool** built to demonstrate how phishing attacks can be structured in a **controlled lab environment**.  
The project combines **Python** and **PHP/HTML** components to simulate realistic attack scenarios and raise **security awareness**.

---

## Features
- **Multiple Phishing Scenarios:** Predefined templates (Instagram, Facebook, Twitter, OBS, etc.) built with HTML/CSS/PHP.  
- **Python Mailer:** Automated selection and creation of phishing emails using a template-based system.  
- **PHPMailer Integration:** Sending demo HTML emails (for controlled testing only).  
- **XAMPP Local Hosting:** Host phishing webpages in a local lab environment.  
- **Logs & Simulation Control:** Track demo scenarios in a controlled, ethical way.

---

## Technologies
- **Python** (simulation controller, email generation)  
- **PHPMailer (PHP)** for HTML email generation  
- **HTML/CSS/PHP** for phishing webpage templates  
- **XAMPP (Apache, MySQL)** for local server hosting  

---

## Project Structure
hexhook/
├─ mailer/ # Python scripts
│ ├─ main.py # Scenario selection and control
│ ├─ mailer.py # Email creation (SMTP demo mode)
│ └─ templates/ # Email HTML templates
├─ web/ # Phishing webpage templates (XAMPP)
│ ├─ facebook/
│ ├─ instagram/
│ ├─ twitter/
│ ├─ obs/
│ └─ sandova/
├─ config/
│ ├─ .env.example # Example environment variables (DO NOT use real credentials)
│ └─ mailer.config.sample.json
└─ docs/
└─ thesis.pdf # Related academic thesis


---

## How to Run (Demo Mode)
> **Important:** Only in a **controlled lab/test environment**. Never use real data or send real phishing emails.

1. Clone the repository  
   ```bash
   git clone https://github.com/arslanEmircan/HexHook-Phishing-Simulation.git

   Purpose

This tool was created to:

Demonstrate how phishing attacks can be technically implemented.

Raise awareness in cybersecurity education.

Provide a safe simulation environment for learning and research.

Author

Muhammet Emircan Arslan
Bachelor’s Thesis – Computer Engineering(2025)

