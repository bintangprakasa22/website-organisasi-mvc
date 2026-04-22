# Website Manajemen Organisasi (MVC PHP)

Proyek website organisasi digital dengan arsitektur **MVC (Model-View-Controller)** murni tanpa framework, dibangun untuk memenuhi tugas UTS/Portofolio.

## 🚀 Fitur Utama
* **Landing Page:** Halaman depan publik yang responsif.
* **Sistem Autentikasi:** Login pengurus dengan enkripsi password.
* **Dashboard Admin:** Statistik anggota dan ringkasan aktivitas.
* **CRUD Anggota:** Tambah, Edit, Hapus, dan Upload Foto Profil.
* **Audit Logs:** Pencatatan aktivitas login dan perubahan data (Audit Trail).
* **Export Data:** Unduh daftar anggota ke format Microsoft Excel (.xls).
* **Keamanan:** Proteksi session, bypass URL protection, dan Custom 404 Error Page.

## 🛠️ Teknologi yang Digunakan
* **Bahasa:** PHP 8.x
* **Database:** MySQL (PDO Driver)
* **Design:** CSS3 (Glassmorphism & Professional UI)
* **Pattern:** Model-View-Controller (MVC)

## 📦 Cara Instalasi
1. Clone repositori ini atau download sebagai ZIP.
2. Letakkan folder di dalam `htdocs` (XAMPP).
3. Import file `database.sql` ke phpMyAdmin.
4. Akses melalui `http://localhost/organisasi_uts/`.