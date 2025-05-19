# LendEase: Sistem Informasi Peminjaman Barang

**LendEase** adalah aplikasi web yang dirancang untuk mengelola proses peminjaman barang dengan fitur pengguna dan admin. Sistem ini memungkinkan pengguna meminjam barang yang tersedia, sementara admin dapat mengelola barang, pengguna, dan aktivitas dalam sistem.

---

## 📂 Rancangan Database

### Tabel `users`
Menyimpan data pengguna yang dapat meminjam atau mengelola barang.

| Kolom       | Tipe Data | Deskripsi                                   |
|-------------|-----------|---------------------------------------------|
| `id`        | INT       | Primary Key, Auto Increment                |
| `name`      | VARCHAR   | Nama pengguna                              |
| `email`     | VARCHAR   | Email pengguna (unik)                      |
| `password`  | VARCHAR   | Password pengguna (dalam format hashed)    |
| `role`      | ENUM      | Peran pengguna (`admin` atau `user`, Default: `user`) |

---

### Tabel `items`
Menyimpan data barang yang bisa dipinjam.

| Kolom        | Tipe Data | Deskripsi                  |
|--------------|-----------|----------------------------|
| `id`         | INT       | Primary Key, Auto Increment|
| `name`       | VARCHAR   | Nama barang               |
| `description`| TEXT      | Deskripsi barang          |
| `stock`      | INT       | Jumlah barang tersedia    |

---

### Tabel `loans`
Mencatat informasi peminjaman barang.

| Kolom         | Tipe Data | Deskripsi                                  |
|---------------|-----------|--------------------------------------------|
| `id`          | INT       | Primary Key, Auto Increment               |
| `user_id`     | INT       | Foreign Key, Relasi ke `users.id`         |
| `item_id`     | INT       | Foreign Key, Relasi ke `items.id`         |
| `amount`      | INT       | Jumlah Barang yang dipinjam               |
| `borrow_date` | DATE      | Tanggal peminjaman                        |
| `return_date` | DATE      | Tanggal pengembalian (NULL jika belum dikembalikan) |
| `status`      | ENUM      | Status (`borrowed` atau `returned`, Default: `borrowed`) |

---

### Tabel `logs` *(Opsional)*
Menyimpan log aktivitas dalam sistem.

| Kolom       | Tipe Data | Deskripsi                                   |
|-------------|-----------|---------------------------------------------|
| `id`        | INT       | Primary Key, Auto Increment                |
| `action`    | VARCHAR   | Aksi yang dilakukan (contoh: "pinjam barang") |
| `user_id`   | INT       | Foreign Key, Relasi ke `users.id`          |
| `item_id`   | INT       | Foreign Key, Relasi ke `items.id`          |
| `amount`    | INT       | Jumlah Barang yang dipinjam                |
| `timestamp` | TIMESTAMP | Waktu aktivitas dilakukan                  |

---

## 🔄 Cara Kerja

### 1. Proses Peminjaman
1. Pengguna login ke sistem.
2. Pengguna memilih barang yang ingin dipinjam.
3. Sistem memeriksa ketersediaan barang (`stock > 0`).
4. Jika tersedia:
   - Sistem mencatat data peminjaman di tabel `loans`.
   - `stock` barang dikurangi sesuai jumlah barang yang dipinjam.
   - Log aktivitas disimpan *(opsional)*.

### 2. Proses Pengembalian
1. Pengguna melihat daftar barang yang sedang dipinjam.
2. Pengguna memilih barang yang ingin dikembalikan.
3. Sistem memperbarui status di tabel `loans` menjadi `returned` dan mengisi `return_date`.
4. `stock` barang bertambah 1.

### 3. Fitur Admin
Admin memiliki akses tambahan untuk:
- Menambah, mengedit, dan menghapus data barang.
- Melihat log aktivitas pengguna.
- Mengelola data pengguna *(opsional)*.

---

## 🖥️ Mockup Halaman Website

### 1. Halaman Login
- Form login untuk pengguna dan admin.

### 2. Dashboard
- **Pengguna**: Menampilkan daftar barang yang tersedia dan status peminjaman.
- **Admin**: Menampilkan statistik barang dan aktivitas peminjaman.

### 3. Halaman Peminjaman
- Daftar barang yang bisa dipinjam.
- Tombol "Pinjam" dengan validasi ketersediaan barang.

### 4. Halaman Pengembalian
- Daftar barang yang sedang dipinjam oleh pengguna.
- Tombol "Kembalikan" untuk mengembalikan barang.

### 5. Halaman Admin
- CRUD barang (Tambah, Edit, Hapus barang).
- Daftar log aktivitas pengguna.

---

## 🚀 Fitur Utama
- **Role Management**: Peran pengguna sebagai admin atau user.
- **Peminjaman Barang**: Meminjam barang dengan validasi ketersediaan stok.
- **Pengembalian Barang**: Mengembalikan barang dengan pembaruan status dan stok.
- **CRUD Barang**: Admin dapat mengelola data barang.
- **Log Aktivitas** *(Opsional)*: Melacak aktivitas dalam sistem.

---

## 📑 Lisensi
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
