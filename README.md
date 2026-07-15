# 🎓 Portova

**Portova** adalah platform portofolio digital untuk mahasiswa, dibangun dengan **Laravel 13**. Mahasiswa dapat mendaftarkan akun, mengunggah proyek, dan menampilkan karya mereka kepada publik — setelah melalui proses review oleh admin.

---

## ✨ Fitur Utama

| Fitur | Deskripsi |
|---|---|
| 🔐 Autentikasi | Register & Login dengan validasi lengkap |
| 👤 Profil Mahasiswa | Upload foto profil, asal universitas, bio, link GitHub & Instagram |
| 📁 Manajemen Proyek | Submit, edit, dan hapus proyek beserta gambar preview |
| 🔍 Eksplorasi | Halaman publik untuk menjelajahi semua proyek yang sudah disetujui |
| ❤️ Likes | Mahasiswa dapat menyukai proyek milik orang lain |
| 🛡️ Panel Admin | Dashboard admin untuk mereview, menyetujui, atau menolak proyek |

---

## 🛠️ Tech Stack

- **Backend:** Laravel 13 (PHP 8.3+)
- **Frontend:** Blade Templates + Tailwind CSS v4
- **Database:** MySQL

---

## ⚙️ Persyaratan Sistem

Pastikan sudah terinstall:

- PHP **>= 8.3**
- Composer
- Node.js & NPM
- MySQL

---

## 🚀 Instalasi & Setup

### 1. Clone Repository

```bash
git clone https://github.com/username/portova.git
cd portova
```

### 2. Setup 

```bash
# Install dependensi PHP
composer install

# Salin file environment
cp .env.example .env

# Generate application key
php artisan key:generate

# Jalankan migrasi
php artisan migrate

# Install dependensi Node.js
npm install

# Build aset frontend
npm run build
```

---

## 🔧 Konfigurasi Environment

Buka file `.env` dan sesuaikan konfigurasi berikut:

```env
APP_NAME=Portova
APP_URL=http://localhost

# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=portova
# DB_USERNAME=root
# DB_PASSWORD=
```