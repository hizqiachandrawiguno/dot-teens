# 🚀 DOT Teens Website — GBI ERC Sawangan

Website resmi **Department of Teens (DOT) GBI ERC Sawangan**. Berisi informasi jadwal ibadah, pendaftaran jemaat baru (Join Us), jadwal pertemuan sel rohani (Fire Cell / Cool), galeri kegiatan, pokok doa, dan dashboard admin terpadu untuk pengurus.

---

## 🛠️ Fitur Utama
1. **Public Website**:
   - **Hero & Profil DOT**: Informasi seputar visi, misi, dan tim kepengurusan DOT Teens.
   - **Jadwal Cell (Spiritual Family)**: Jadwal pertemuan mingguan grup sel berdasarkan tahun kelahiran.
   - **Galeri Foto & Drive**: Dokumentasi foto kegiatan dengan tautan Google Drive album penuh.
   - **Form Pendaftaran Jemaat Baru**: Form pendaftaran interaktif langsung terhubung ke database pengurus.
   - **Prayer Board (Dukungan Doa)**: Formulir permohonan doa bagi jemaat yang membutuhkan dukungan.

2. **Admin Dashboard (Protected)**:
   - Manajemen Acara & Kegiatan.
   - Manajemen Jadwal Cell.
   - Manajemen Galeri Foto.
   - Divisi Pastoral: Absensi jemaat, rekap kehadiran, import data CSV/Spreadsheet, saklar buka/tutup form jemaat.
   - Divisi Prayer: Verifikasi & tindak lanjut permohonan doa.
   - CCTV Activity Logs & Status Undangan WhatsApp.

---

## ⚡ Panduan Instalasi & Menjalankan di Lokal

### 1. Prasyarat
- PHP >= 8.2 (dengan ekstensi `pdo_mysql`, `gd`, `mbstring`)
- Composer
- MySQL / MariaDB (melalui Laragon / XAMPP)

### 2. Langkah Setup
1. Clone repository:
   ```bash
   git clone https://github.com/hizqiachandrawiguno/dot-teens.git
   cd dot-teens
   ```
2. Pasang dependensi:
   ```bash
   composer install
   ```
3. Konfigurasi `.env`:
   Salin `.env.example` ke `.env`, sesuaikan nama database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_dotsawangan
   DB_USERNAME=root
   DB_PASSWORD=
   ```
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Jalankan migrasi database:
   ```bash
   php artisan migrate
   ```

---

## 📱 Cara Akses dari HP (Local Network / Wi-Fi)

Agar website bisa diakses dari HP tanpa error DNS atau koneksi ditolak:

1. Pastikan laptop/PC dan HP terhubung ke **jaringan Wi-Fi yang sama**.
2. Buka Command Prompt / PowerShell di laptop, cari IP lokal dengan mengetik:
   ```cmd
   ipconfig
   ```
   Catat **IPv4 Address** Anda (contoh: `192.168.1.15`).
3. Jalankan server Laravel dengan parameter `--host=0.0.0.0`:
   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```
4. Buka browser di HP Anda (Chrome/Safari) dan ketik:
   ```
   http://192.168.1.15:8000
   ```
   *(Ganti `192.168.1.15` dengan IPv4 laptop Anda)*.

---

## 📈 Catatan Optimasi Performa Terbaru
- **Kompresi Aset Gambar**: File ilustrasi header sebelumnya berukuran **38 MB** (karena 5 foto 4K base64 mentah), kini telah dikompresi menjadi format modern WebP sebesar **98 KB** (turun 99.7%!), rendering instan dan anti-crash di browser HP.
- **Lazy Loading**: Seluruh gambar di bawah layar menggunakan `loading="lazy"` agar halaman pertama terbuka secepat kilat.
- **Perbaikan Schema Database**: Menambahkan migrasi kolom tambahan jemaat sehingga form submit di HP tidak lagi menghasilkan SQL Error 1054.
- **Mobile Responsive CSS**: Animasi orb dan efek blur diringankan khusus layar HP agar scrolling mulus 60 FPS tanpa panas/lag.

---
© 2026 Department Teens GBI ERC Sawangan.
