# 🧭 HR Management System – Laravel 12 + Breeze

Sistem ini dikembangkan menggunakan **Laravel 12** dengan **Laravel Breeze** sebagai autentikasi dasar.  
Website ini dirancang untuk mengelola data karyawan dengan sistem peran (**role-based access control**) yaitu **HR** dan **non-HR** (seperti IT, Keuangan, dll).

---

## 🚀 Fitur Utama

### 🔐 Autentikasi
- Login dan Register menggunakan Laravel Breeze.
- Middleware untuk membedakan akses **HR** dan **non-HR**.
- Redirect otomatis setelah login sesuai role.

---

## 🧑‍💼 Role & Akses

### 1. **Role HR**
Memiliki akses penuh ke seluruh menu dan fitur berikut:
- **Task** → CRUD tugas untuk karyawan.  
- **Employee** → CRUD data karyawan.  
- **Departemen** → CRUD data departemen.  
- **Role** → CRUD jabatan atau posisi.  
- **Presence (Kehadiran)** → Melihat dan menambah data kehadiran karyawan.  
- **Payroll (Penggajian)** → CRUD data gaji karyawan.  
- **Cuti (Leave)** → CRUD data pengajuan cuti.

### 2. **Role Non-HR (IT, Keuangan, dll)**
Hanya memiliki akses terbatas:
- **Task** → Hanya dapat melihat daftar tugas.  
- **Presence** → Dapat menambah kehadiran (Check In/Out).  
- **Payroll** → Hanya dapat melihat data penggajian pribadi.  
- **Cuti (Leave)** → Dapat menambah pengajuan cuti dan melihat status.  
> Tampilan non-HR lebih sederhana — hanya menampilkan nama pengguna tanpa menu tambahan seperti *Employee* dan *Departemen*.

---

## 🗂️ Struktur Navigasi

| Menu | HR | Non-HR |
|------|----|--------|
| Dashboard | ✅ | ✅ |
| Task | CRUD | Lihat Saja |
| Employee | CRUD | ❌ |
| Departemen | CRUD | ❌ |
| Role | CRUD | ❌ |
| Presence | CRUD | Tambah & Lihat |
| Payroll | CRUD | Lihat Saja |
| Cuti | CRUD | Tambah & Lihat |

---

## 🧩 Tampilan (Preview)

### 🔹 1. Halaman Awal / Login
Tampilan default dari Laravel Breeze (Login & Register).  
> ![Login Page](docs/screenshots/login.png)

---

### 🔹 2. Dashboard HR
Menampilkan seluruh menu navigasi utama untuk pengelolaan karyawan:
> ![Dashboard HR](docs/screenshots/dashboard_hr.png)

#### Contoh tampilan sidebar HR:
> ![Sidebar HR](docs/screenshots/sidebar_hr.png)

---

### 🔹 3. Dashboard Non-HR (IT / Keuangan)
Tampilan lebih sederhana — hanya menampilkan **nama user** di bagian atas dan menu terbatas:
> ![Dashboard Non-HR](docs/screenshots/dashboard_nonhr.png)

#### Contoh tampilan header Non-HR:
> ![Header Non-HR](docs/screenshots/header_nonhr.png)

> Catatan: Tidak ada menu **Employee**, **Departemen**, atau **Role** di sidebar Non-HR.

---

## ⚙️ CRUD Screenshots

### 🧾 Task
| Aksi | Screenshot |
|------|-------------|
| Add | ![Add Task](docs/screenshots/task_add.png) |
| Edit | ![Edit Task](docs/screenshots/task_edit.png) |
| Delete | ![Delete Task](docs/screenshots/task_delete.png) |
| Index | ![Task List](docs/screenshots/task_index.png) |

---

### 👥 Employee (Hanya HR)
| Aksi | Screenshot |
|------|-------------|
| Add | ![Add Employee](docs/screenshots/employee_add.png) |
| Edit | ![Edit Employee](docs/screenshots/employee_edit.png) |
| Delete | ![Delete Employee](docs/screenshots/employee_delete.png) |
| Index | ![Employee List](docs/screenshots/employee_index.png) |

---

### 🏢 Departemen (Hanya HR)
> ![Departemen List](docs/screenshots/departemen_index.png)

---

### 📅 Presence
| Aksi | Screenshot |
|------|-------------|
| Add (Check In) | ![Add Presence](docs/screenshots/presence_add.png) |
| Index | ![Presence Index](docs/screenshots/presence_index.png) |

---

### 💰 Payroll
| Aksi | Screenshot |
|------|-------------|
| Index (HR) | ![Payroll HR](docs/screenshots/payroll_index_hr.png) |
| Index (Non-HR) | ![Payroll Non-HR](docs/screenshots/payroll_index_nonhr.png) |
| Detail | ![Payroll Detail](docs/screenshots/payroll_show.png) |

---

### 🌴 Cuti
| Aksi | Screenshot |
|------|-------------|
| Add | ![Add Leave](docs/screenshots/cuti_add.png) |
| Edit | ![Edit Leave](docs/screenshots/cuti_edit.png) |
| Index | ![List Leave](docs/screenshots/cuti_index.png) |

---

## 🧠 Teknologi yang Digunakan

| Kategori | Teknologi |
|-----------|------------|
| Framework | Laravel 12 |
| Autentikasi | Laravel Breeze |
| Database | MySQL |
| Frontend | Blade Template, Bootstrap |
| Bahasa | PHP 8+, HTML, CSS, JS |
| Tools | Composer, Artisan CLI |

---

## 🪜 Cara Menjalankan Proyek

```bash
# 1. Clone repository
git clone https://github.com/username/nama-proyek.git
cd nama-proyek

# 2. Install dependencies
composer install
npm install && npm run dev

# 3. Salin dan konfigurasi file .env
cp .env.example .env
php artisan key:generate

# 4. Atur koneksi database di .env
DB_DATABASE=hr_management
DB_USERNAME=root
DB_PASSWORD=

# 5. Migrasi dan seeding database
php artisan migrate --seed

# 6. Jalankan server
php artisan serve
