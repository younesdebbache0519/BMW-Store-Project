# 🏎️ BMW Store Project

A full-stack web application designed for showcasing and ordering BMW cars. This project was developed as a practical web development assignment (TP DAW) at the University of Sétif 1.

---

## 🌐 Live Demo
The application is deployed live on the cloud and fully secured using SSL (HTTPS) encryption:
🔗 **[Live Website Link](https://bwm.rf.gd)**

---

## 🛠️ Tech Stack
* **Front-End:** HTML5, CSS3, JavaScript (Fully responsive UI with a premium dark theme).
* **Back-End & Database:** PHP 8.2 & MySQL (Connected securely via PDO).

---

## ⚙️ Application Logic (User Flow & Session Management)

The core architecture of this application relies on PHP Sessions to dynamically manage user permissions and access control:

* **First-Time Visit (Unauthenticated Visitor):** When accessing the homepage (`index.php`) for the first time, the system recognizes you as a visitor because no active `Session ID` is found. The interface dynamically displays a custom visitor welcome message: **"Hello Guest"**.
* **Handling Unauthorized Orders:** If a visitor tries to view details or place an order (`commande.php`), the back-end script immediately runs a backend validation check on the session status. Since the user is not authenticated, the system blocks the action and automatically redirects the user to the login page (`login.php`).
* **Registration & Secure Session State:** New users can register via (`inscription.php`), which validates and inserts their credentials into the MySQL database. Upon a successful login, the server initializes a secure user session. The homepage welcome header dynamically updates from "Guest" to the user's actual name, granting full clearance to submit orders that map directly to their User ID in the database.

---

## 🚀 Environment & Deployment
* **Local Development:** Built and tested locally on macOS using a **XAMPP** environment.
* **Cloud Production:** Successfully migrated to production hosting via **InfinityFree**, backed by a cloud MySQL server, with **Let's Encrypt SSL** fully enabled for secure structural `HTTPS` communication.

---

## 📝 Important Note for the Evaluator

* **Regarding Database Selection:** Initially, the project was structured and tested locally using a flat-file **SQLite** setup to simplify environmental portable testing.
* **Migration to Cloud:** However, since **InfinityFree** cloud servers restrict file-system writing capabilities for SQLite files due to security policies, the architecture was dynamically reverted to a production-ready **MySQL** cloud environment. This ensures all transaction sequences and remote database records operate seamlessly on the live server.

---

## 💡 ملاحظة صغيرة  

   صح كاين حوايج عاوني فيهم الذكاء الاصطناعي خاصة كوتي **PHP** و **PDO** وغيرها، ولكن راني فهمتهم مليح قبل ما نحطهم في الكود تاعي لانو علبالي بلي راح نحتاجهم في المستقبل بإذن الله.
* **كلمة ختامية:** إن شاء الله يكون عجبك تعبي يا أستاذ وإن شاء الله تعطيني فيه علامة مليحة.

---

## 👤 Developer Info
* **Name:** Younes Debbache
* **Academic Level:** 2nd Year Computer Science (L2)
* **Institution:** Ferhat Abbas University (Sétif 1), Algeria.