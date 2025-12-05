# TRAVESTA - Platform Eksplorasi Wisata Nusantara

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=flat&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=flat&logo=bootstrap&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green.svg)

**Travesta** merupakan sebuah aplikasi web yang bertujuan untuk memberikan informasi dan rekomendasi destinasi wisata di seluruh Indonesia. Aplikasi ini dirancang untuk membantu masyarakat dan wisatawan menemukan destinasi wisata menarik berdasarkan kategori seperti pantai, pegunungan, alam, kota, budaya, dan kuliner.

## Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Tech Stack](#-tech-stack)
- [Persyaratan Sistem](#️-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi](#4-konfigurasi-database)
- [Role & Permissions](#️-role--permissions)
- [Fitur Berdasarkan Role](#-fitur-berdasarkan-role)
- [Screenshot](#-screenshot-halaman-sistem-travesta)
- [Struktur Database](#️-struktur-database)
- [Arsitektur & Komponen](#arsitektur--komponen)
- [Penggunaan](#penggunaan)
- [Deployment](#deployment)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)


## ✨ Fitur Utama

### 1. 🗺️ Eksplorasi Destinasi dan Artikel

- **📍 Daftar Destinasi Wisata**  
  Pengguna dapat melihat berbagai destinasi wisata populer lengkap dengan gambar, deskripsi, dan informasi lokasi.

- **📰 Artikel & Blog Wisata**  
  Pengguna dapat membaca artikel seputar tips perjalanan, rekomendasi wisata, dan berita terkait dunia traveling.

- **🏷️ Kategori & Tags**  
  Pengguna dapat memilih kategori atau tag untuk menampilkan artikel yang relevan berdasarkan topik tertentu.

---

### 2. 💬 Interaksi Pengguna

- **💭 Komentar pada Artikel**  
  Pengguna dapat memberikan komentar untuk berbagi pendapat, informasi tambahan, atau berdiskusi dengan pengguna lain.

---

### 3. 🔎 Pencarian Konten

- **🔍 Fitur Pencarian**  
  Pengguna dapat mencari artikel atau destinasi berdasarkan kata kunci tertentu.

---

### 4. 👤 Manajemen Pengguna

- **🔐 Autentikasi (Login & Register)**  
  Pengguna dapat membuat akun baru atau masuk ke akun yang sudah ada.

- **⚙️ Manajemen Profil Pengguna**  
  Pengguna dapat memperbarui nama, email, dan password.

---

### 5. 📝 Manajemen Konten oleh Admin

- **🛠️ CRUD Postingan**  
  Admin dapat membuat, melihat, mengedit, dan menghapus artikel wisata lengkap dengan gambar, kategori, dan tag.

- **📂 Manajemen Kategori**  
  Admin dapat menambah, mengubah, dan menghapus kategori artikel.

- **🔖 Manajemen Tags**  
  Admin dapat mengelola tag untuk mempermudah pengelompokan konten.

---

### 6. 🛡️ Moderasi Komentar

- **📋 Pengelolaan Komentar**  
  Admin dapat melihat seluruh komentar yang masuk.

- **🗑️ Hapus Komentar**  
  Admin dapat menghapus komentar yang tidak pantas atau melanggar aturan.

- **✍️ Tambah Komentar Admin**  
  Admin dapat memberikan komentar langsung dari panel admin.

---

### 7. 📊 Pemantauan Aktivitas Sistem

- **🧾 Activity Logs**  
  Admin dapat memantau riwayat aktivitas sistem seperti login, perubahan profil admin, dan aktivitas konten.  
  Aktivitas pengguna dicatat terbatas pada komentar.

---

### 8. 🎨 Personalisasi & Pengalaman Pengguna

- **🌙🌞 Dark Mode / Light Mode**  
  Pengguna dapat beralih antara mode terang dan gelap.

- **📱 Desain Responsif**  
  Tampilan optimal di mobile, tablet, dan desktop.

---

### 9. 📘 Optimasi Informasi

- **📖 Halaman Detail Destinasi & Artikel**  
  Setiap destinasi dan artikel memiliki halaman detail dengan informasi lengkap yang membantu pengguna mencari referensi perjalanan.


## 🧰 Tech Stack

### ⚙️ Backend
- **Laravel Framework 12.36.1** – Framework PHP utama.
- **MySQL** – Sistem manajemen basis data.

### 🎨 Frontend
- **Bootstrap 5** – Framework CSS untuk Landing Page pengguna.
- **Tailwind CSS** – Framework CSS untuk Dashboard Admin (via Preline UI).
- **Preline UI** – Komponen UI berbasis Tailwind.
- **Blade Templates** – Template engine bawaan Laravel.

### 📦 Libraries & Packages
- **Swiper.js** – Slider interaktif untuk banner & galeri.
- **Magnific Popup** – Responsif lightbox untuk gambar.
- **SweetAlert2** – Popup notifikasi modern.
- **SimpleBar** – Custom scrollbar.
- **Animate.css & WOW.js** – Animasi scroll yang halus.
- **FontAwesome & Iconify** – Pustaka ikon vektor.

### 🔧 Tools & Utilities
- **Node.js & NPM** – Dependency frontend & Vite runner.
- **Composer** – Dependency manager PHP.
- **Laravel Artisan CLI** – Perintah CLI `php artisan`.
- **Vite Asset Builder** – Build CSS & JavaScript.
- **Tailwind CSS 4.0** – Styling modern dan utility-first.

---

## 🖥️ Persyaratan Sistem

- **PHP >= 8.2**
- **MySQL >= 5.7** atau **MariaDB >= 10.3**
- **Composer**
- **Node.js & NPM**
- **Web Server (Apache/Nginx)**
- **Extension PHP yang diperlukan:**
  - PDO  
  - OpenSSL  
  - Mbstring  
  - Tokenizer  
  - XML  
  - Ctype  
  - JSON  

---
## 🚀 Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/aidilsaputrakirsan-classroom/final-project-cloud-computing-a-cc-kelompok-5-victus.git
cd final-project-cloud-computing-a-cc-kelompok-5-victus
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node dependencies (Frontend assets)
npm install
```

### 3. Setup Environment
```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=travesta
DB_USERNAME=travesta_user
DB_PASSWORD=
```

### 5. Migrasi Database
```bash
# Jalankan migrasi dan seeder (mengisi data awal/dummy)
php artisan migrate --seed

# Atau jika ingin fresh install
php artisan migrate:fresh --seed
```

### 6. Setup Storage
```bash
# Create symbolic link agar gambar bisa diakses publik
php artisan storage:link
```

### 7. Build Assets
```bash
# Development (Hot Module Replacement)
npm run dev

# Production Build
npm run build
```

### 8. Jalankan Aplikasi
```bash
# Development server
php artisan serve
```

Aplikasi akan berjalan di:
👉 **http://localhost:8000**

---
### 📧 Konfigurasi Email (Opsional)
Tambahkan atau sesuaikan pada file `.env`:

```env
MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 📦 File Storage (AWS S3 / Opsional)

```env
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false
```
## 🛡️ Role & Permissions

Sistem menggunakan **2 role utama** dengan izin akses yang berbeda:

| Role | Deskripsi |
|------|-----------|
| **User (Wisatawan)** | Pengguna umum yang menjelajahi destinasi wisata, membaca artikel, dan berinteraksi melalui komentar. |
| **Admin** | Pengelola sistem yang bertanggung jawab atas manajemen konten, kategori, tag, komentar, serta *activity logs* yang mencatat seluruh aktivitas sistem. |

---

## 🎯 Fitur Berdasarkan Role

### 👤 User (Pengunjung/Wisatawan)
- Melihat daftar destinasi wisata  
- Membaca artikel, blog, dan berita wisata  
- Menggunakan fitur pencarian destinasi atau artikel  
- Memberikan komentar pada artikel  
- Mengaktifkan/mematikan dark mode  
- Mengakses website pada tampilan responsif (mobile/desktop)  
- Mengklik **Kategori** untuk melihat artikel berdasarkan kategori  
- Mengklik **Tags** untuk menampilkan artikel berdasarkan tag  

---

### 🛠️ Admin
- Login ke dashboard admin  
- Mengelola postingan (**CRUD**)  
- Mengelola kategori (**CRUD**)  
- Mengelola tags (**CRUD**)  
- Mengelola komentar (lihat, hapus, tambah sebagai admin)  
- Mengelola profil admin (update nama, email, password, hapus akun)  
- Melihat **activity logs** untuk seluruh riwayat aktivitas  

---
# 📸 Screenshot Halaman Sistem Travesta

## 🧭 Daftar Halaman Landing Page (Pengguna)

### 1. Halaman Landing Page  
Halaman utama yang menampilkan banner wisata, menu navigasi, dan akses ke destinasi/artikel.  
![Landing Page](screenshots/landing-page.png)

### 2. Halaman Profile  
Berisi informasi tentang kami, tujuan Travesta, deskripsi platform, anggota tim, dan testimoni pengguna.  
![Halaman Profile](screenshots/profile-page.png)

### 3. Halaman Daftar Destinasi  
Menampilkan kumpulan destinasi wisata populer dalam bentuk kartu.  
![Daftar Destinasi](screenshots/destinasi-list.png)

### 4. Halaman Detail Artikel  
Menampilkan detail artikel: deskripsi, kategori, dan tags.  
![Detail Artikel](screenshots/article-detail.png)

### 5. Halaman Komentar Artikel  
Menampilkan daftar komentar pengguna dan form untuk memberikan komentar.  
![Menambahkan Komentar Artikel](screenshots/article-addcoments.png)
![Daftar Komentar Artikel](screenshots/article-comments.png)

### 6. Halaman Pencarian  
Hasil pencarian berdasarkan kata kunci yang dimasukkan pengguna.  
![Halaman Pencarian](screenshots/search-result.png)

### 7. Halaman Kategori  
Daftar artikel berdasarkan kategori yang dipilih pengguna.  
![Halaman Kategori](screenshots/category-page.png)

### 8. Halaman Tag  
Menampilkan artikel berdasarkan tag yang dipilih.  
![Halaman Tag](screenshots/tag-page.png)


---

## 🖥️ Daftar Halaman Dashboard (Admin)

### 1. Halaman Login Admin  
Form login admin untuk mengakses dashboard manajemen.  
![Login Admin](screenshots/login-admin.png)

### 2. Halaman Post  
Daftar semua postingan lengkap dengan kategori, status, penulis, tanggal terbit, dan aksi edit/hapus.  
![Halaman Post](screenshots/post-index.png)

### 3. Halaman Create Post  
Form untuk membuat postingan baru.  
![Create Post](screenshots/post-create.png)

### 4. Halaman Edit Post  
Form untuk mengedit postingan yang sudah dibuat.  
![Edit Post](screenshots/post-edit.png)

### 5. Halaman Kategori  
Daftar kategori beserta slug, parent, status, jumlah post, serta aksi edit/hapus.  
![Kategori](screenshots/category-index.png)

### 6. Halaman Create Kategori  
Form untuk menambahkan kategori baru.  
![Create Kategori](screenshots/category-create.png)

### 7. Halaman Edit Kategori  
Form untuk memperbarui kategori yang sudah ada.  
![Edit Kategori](screenshots/category-edit.png)

### 8. Halaman Komentar  
Daftar postingan yang memiliki komentar.  
![Halaman Komentar](screenshots/comment-index.png)

### 9. Halaman Manajemen Komentar  
Menampilkan komentar pada satu postingan + aksi hapus/edit komentar + tambah komentar oleh admin.  
![Manajemen Komentar](screenshots/comment-manage.png)

### 10. Halaman Edit Komentar Admin  
Form untuk mengubah isi komentar yang ditulis admin.  
![Edit Komentar Admin](screenshots/comment-edit-admin.png)

### 11. Halaman Tag  
Daftar tag: nama, slug, jumlah post, aksi edit/hapus, dan tambah tag.  
![Halaman Tag](screenshots/tag-index.png)

### 12. Halaman Create Tag  
Form untuk menambahkan tag baru.  
![Create Tag](screenshots/tag-create.png)

### 13. Halaman Edit Tag  
Form memperbarui tag yang sudah dibuat.  
![Edit Tag](screenshots/tag-edit.png)

### 14. Halaman Activity Log  
Riwayat aktivitas admin terkait postingan, kategori, tag, dan komentar.  
![Activity Log](screenshots/activity-log.png)

### 15. Halaman Manajemen Profile  
Update profil admin (nama, email, password) + hapus akun permanen.  
![Manajemen Profile](screenshots/profile-management.png)

---

# 🗂️ Struktur Database

Database **travesta** terdiri dari tabel utama berikut:

---

## 📌 1. `users`
Menyimpan data autentikasi admin.

| Kolom | Fungsi |
|-------|--------|
| `id` | Primary key |
| `name` | Nama admin |
| `email` | Email unik |
| `password` | Hash password |

---

## 📌 2. `posts`
Menyimpan artikel & destinasi wisata.

| Kolom | Fungsi |
|-------|--------|
| `id` | Primary key |
| `user_id` | Penulis artikel |
| `category_id` | Kategori |
| `title` | Judul |
| `slug` | URL SEO-friendly |
| `content` | Isi artikel |
| `featured_image` | Gambar utama |
| `status` | draft / published / archived |
| `tags` | JSON: daftar ID tag |
| `published_at` | Tanggal publikasi |

---

## 📌 3. `categories`
Pengelompokan jenis wisata.

| Kolom | Fungsi |
|-------|--------|
| `id` | Primary key |
| `parent_id` | Sub-kategori |
| `name` | Nama kategori |
| `slug` | URL kategori |
| `is_active` | Status aktif |

---

## 📌 4. `comments`
Interaksi pengunjung pada artikel.

| Kolom | Fungsi |
|-------|--------|
| `id` | Primary key |
| `post_id` | Artikel terkait |
| `name` | Nama commenter |
| `email` | Email |
| `content` | Isi komentar |
| `owner_token` | Identifikasi guest |
| `is_admin` | Komentar dari admin |

---

## 📌 5. `tags`
Label penanda untuk artikel.

| Kolom | Fungsi |
|-------|--------|
| `id` | Primary key |
| `name` | Nama tag |
| `slug` | URL tag |

---

## 📌 6. `activity_logs`
Audit trail aktivitas sistem.

| Kolom | Fungsi |
|-------|--------|
| `id` | Primary key |
| `user_id` | Pelaku aktivitas |
| `action` | Aksi (create, update, delete, read) |
| `description` | Deskripsi aktivitas |
| `ip_address` | IP pengguna |
| `loggable_type` / `loggable_id` | Polimorfik objek terkait |

---

# 🔗 Relasi Database

### 👤 Pengguna & Aktivitas
- `users` **1──N** `posts`  
- `users` **1──N** `activity_logs`

### 📚 Konten & Kategori
- `categories` **1──N** `posts`  
- `categories` **1──N** `categories` (sub-category)

### 💬 Interaksi & Tag
- `posts` **1──N** `comments`  
- `posts` **M──N** `tags` (disimpan via kolom JSON)

---

# Arsitektur & Komponen

## Arsitektur Aplikasi
Website Travesta dibangun menggunakan arsitektur *MVC (Model–View–Controller)* bawaan Laravel, yang memisahkan logika aplikasi, tampilan, dan pengelolaan data sehingga sistem mudah dikembangkan dan dikelola.

Secara garis besar, arsitektur Travesta terdiri dari:

### 1. Controllers
Mengelola *business logic*, proses *request–response*, dan routing fitur utama:

- **PostController** – kelola artikel (tambah, edit, hapus, tampil)
- **CategoryController** – kelola kategori
- **TagController** – kelola tags
- **CommentController** – kelola komentar pengguna & admin
- **ActivityController** – menampilkan riwayat aktivitas admin & pengguna
- **ProfileController** – kelola profil admin dan pengguna
- **UserController** – manajemen user dari panel admin
- **AuthController** – proses login & register

### 2. Models
Representasi dan manajemen data utama dalam database:

- **User**
- **Category**
- **Tag**
- **Comment**
- **ActivityLog**
- **Post**

### 3. Views
Seluruh tampilan antarmuka:

- Halaman pengguna (beranda, artikel, detail artikel, profil, komentar)
- Halaman admin (dashboard, kelola artikel, kategori, tags, komentar, aktivitas, profil admin)

### 4. Routes
Mengatur seluruh jalur navigasi aplikasi:

- Web routes

### 5. Assets
Berisi elemen tampilan:

- CSS/Bootstrap/Tailwind styling  
- JavaScript interaksi UI  
- Gambar, ikon, dan file pendukung tampilan Travesta  

---

# Fitur Teknis Unggulan

- **Authentication System** – Sistem login dan registrasi pengguna & admin  
- **Manajemen Post (CRUD)** – Tambah, edit, hapus, dan tampilkan artikel  
- **Manajemen Kategori & Tags** – Pengelompokan dan pengaturan konten artikel  
- **Komentar Pengguna & Admin** – Pengguna dapat berkomentar, admin dapat menghapus/menambah komentar  
- **Riwayat Aktivitas** –  
  - Admin: aktivitas penuh (kelola artikel, kategori, tags, komentar, profil, user)  
  - Pengguna: aktivitas komentar  
- **Profil Pengguna & Admin** – Update nama, email, password + hapus akun  
- **Responsive Design** – Mendukung berbagai ukuran layar  
- **Search & Filter** – Pencarian artikel berdasarkan kategori/tags  

---

# Testing

Pengujian pada aplikasi Travesta dilakukan menggunakan metode **manual testing**, yaitu pemeriksaan langsung terhadap setiap fitur untuk memastikan seluruh fungsi berjalan sesuai kebutuhan baik dari sisi pengguna maupun admin. Pengujian difokuskan pada validasi alur, tampilan, dan interaksi pada website.

## Konfigurasi Test

### Metode Pengujian
- Menggunakan manual testing melalui browser.

### Lingkup Pengujian
Meliputi seluruh fitur utama, seperti:

- Akses landing page & halaman destinasi  
- Filter kategori dan tag  
- Form komentar tanpa login  
- CRUD kategori, tag, dan postingan oleh admin  
- Manajemen komentar  
- Activity logs  
- Pengelolaan profil admin  

### Skenario Pengujian

#### 1. Pengguna (tanpa login)
- Mengakses artikel  
- Memfilter konten  
- Membaca & memberikan komentar  

#### 2. Admin
- Mengelola konten, kategori, tag  
- Mengelola komentar  
- Memantau aktivitas pengguna & admin  
- Mengelola profil admin  

### Validasi
- **Validasi Input** – memastikan form komentar, postingan, kategori, tag, dan profil admin sesuai aturan  
- **Validasi Output** – memastikan data tampil sesuai halaman  
- **Validasi UI** – tampilan konsisten, responsif, mudah digunakan  

---

# Penggunaan

## Login Pertama Kali
Setelah menjalankan seeder (`php artisan migrate --seed`), Anda dapat login menggunakan akun default (cek **DatabaseSeeder.php** atau **UserSeeder.php**) atau membuat akun baru via register.

## Workflow Umum

### A. Alur Admin
1. Login ke dashboard admin  
2. Mengelola kategori artikel  
3. Mengelola tag  
4. Membuat postingan destinasi baru  
5. Publikasi postingan  
6. Edit/hapus postingan  
7. Mengelola komentar  
8. Memantau riwayat aktivitas  
9. Mengelola profil admin  

### B. Alur Pengguna
1. Membuka landing page Travesta  
2. Mengakses halaman Tentang Kami  
3. Membuka halaman Destination  
4. Melihat detail post beserta komentar  
5. Menyaring postingan berdasarkan kategori/tag  
6. Memberikan komentar tanpa login  

---

# Deployment

## Requirements Production
- PHP 8.2+  
- Composer  
- NPM  
- Database MySQL/MariaDB  

## Production Setup
1. Update server  
2. Install NGINX  
3. Install PHP 8.2 + extensions Laravel  
4. Install MySQL Server  
5. Clone Project Laravel  
6. Install dependencies: `composer install --optimize-autoloader --no-dev`  
7. Atur file `.env` untuk production (`APP_DEBUG=false`)  
8. Generate App Key  
9. Setup database  
10. Setup NGINX  
11. Set file permissions  
12. Jalankan migrasi  
13. Build frontend assets: `npm run build`  
14. Pastikan folder `storage/` writable (`chmod -R 775 storage`)  

---

# Kontribusi

Kontribusi selalu diterima!  

1. Fork repository  
2. Buat branch fitur baru  
3. Commit perubahan  
4. Push branch  
5. Buat Pull Request  

---

# Coding Standards

Proyek mengikuti standar kode komunitas Laravel & PHP modern.

- **PHP Standard**: PSR-12 (gaya penulisan), PSR-4 (autoloading)  
- **Code Style Tool**: *Laravel Pint* (v^1.24)  
- **EditorConfig**:
  - Charset: utf-8  
  - End of Line: LF  
  - Indent Style: Space  
  - Indent Size: 4 spasi (PHP), 2 spasi (JSON/YAML)  

### Naming Convention
- **Controllers & Models**: PascalCase (`PostController`, `ActivityLog`)  
- **Methods & Variables**: camelCase (`index()`, `$validatedData`)  
- **Views**: kebab-case / dot notation (`landing.blog`)  

---

# Lisensi
Project ini dilisensikan di bawah **MIT License**.

---

# Credits
- **Laravel Framework**  
- **Bootstrap 5**  
- **Tailwind CSS**  
- **Preline UI**  
- **Vite**  
- **Axios**  
- **Swiper.js**  
- **SweetAlert2**  
- **Magnific Popup**  
- **Animate.css**  
- **Font Awesome**

---

# Support
Developed with ❤️ by **Tim Victus - Cloud Computing Class A**  
Institut Teknologi Kalimantan – 2025
