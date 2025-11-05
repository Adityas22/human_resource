# 🧭 HR Management System – Laravel 12 + Breeze

Sistem ini dikembangkan menggunakan **Laravel 12** dengan **Laravel Breeze** sebagai autentikasi dasar.  
Website ini dirancang untuk mengelola data karyawan dengan sistem peran (**role-based access control**) yaitu **HR** dan **non-HR** (seperti IT, Keuangan, dll).

---

## 🚀 Fitur Utama

### 🔐 Autentikasi
- Login dan Register menggunakan Laravel Breeze.
- Middleware untuk membedakan akses **HR** dan Non-HR **(IT, Keuangan)**.
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
- **Payroll** → Hanya dapat melihat dan cetak data penggajian pribadi.  
- **Cuti (Leave)** → Dapat menambah pengajuan cuti dan melihat status.  

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
> ![Login Page](ss/login.png)

---

### 🔹 2. Dashboard HR
Menampilkan seluruh menu navigasi utama untuk pengelolaan karyawan:
> ![Dashboard HR](ss/HR_Index.png)

---

### 🔹 3. Dashboard Non-HR (IT / Keuangan)
Tampilan lebih sederhana — hanya menampilkan **nama user** di bagian atas dan menu terbatas:
> ![Dashboard Non-HR](ss/All_Index.png)

---

## ⚙️Screenshots HR

### 🧾 Task
| Aksi | Screenshot |
|------|-------------|
| Add | ![Add Task](ss/HR_Task_Add.png) |
| Edit | ![Edit Task](ss/HR_Task_Edit.png) |
| Delete | ![Delete Task](ss/HR_Task_Delete.png) |
| Detail | ![Task Detail](ss/HR_Task_Show.png) |
| Index | ![Task List](ss/HR_Task_index.png) |

---

### 👥 Employee
| Aksi | Screenshot |
|------|-------------|
| Add | ![Add Employee](ss/HR_Employee_Add.png) |
| Edit | ![Edit Employee](ss/HR_Employee_Edit.png) |
| Delete | ![Delete Employee](ss/HR_Employee_Delete.png) |
| Detail | ![Detail Employee](ss/HR_Employee_Show.png) |
| Index | ![Employee List](ss/HR_Employee_Index.png) |


---

### 🏢 Departemen
| Aksi | Screenshot |
|------|-------------|
| Add (Check In) | ![Departemen Add](ss/HR_Departemen_Add.png) |
| Edit | ![Departemen Edit](ss/HR_Departemen_Edit.png) |
| Delete | ![Departemen Delete](ss/HR_Departemen_Delete.png) |
| Detail | ![Departemen Detail](ss/HR_Departemen_Show.png) |
| Index | ![Departemen Index](ss/HR_Departemen_Index.png) |

---

### 📅 Presence
| Aksi | Screenshot |
|------|-------------|
| Add | ![Presence Add](ss/HR_Presence_Add.png) |
| Edit | ![Presence Edit](ss/HR_Presence_Edit.png) |
| Delete| ![Presence Delete](ss/HR_Presence_Delete.png) |
| Index| ![Presence Index](ss/HR_Presence_Index.png) |

---

### 💰 Payroll
| Aksi | Screenshot |
|------|-------------|
| Add| ![Payroll Add](ss/HR_Payroll_Add.png) |
| Edit | ![Payroll Edit](ss/HR_Payroll_Edit.png) |
| Delete | ![Payroll Delete](ss/HR_Payroll_Delete.png) |
| Detail | ![Payroll Detail](ss/HR_Payroll_Show.png) |
| Index | ![Payroll Index](ss/HR_Payroll_Index.png) |
| Cetak | ![Payroll Cetak](ss/HR_Payroll_Cetak.png) |

---

### 🌴 Cuti
| Aksi | Screenshot |
|------|-------------|
| Add | ![Add Leave](ss/HR_Cuti_Add.png) |
| Edit | ![Edit Leave](ss/HR_Cuti_Edit.png) |
| Delete | ![Delete Leave](ss/HR_Cuti_Delete.png) |
| Index | ![List Leave](ss/HR_Cuti_Index.png) |

---

## ⚙️Screenshots Non-HR

### 🧾 Task
| Aksi | Screenshot |
|------|-------------|
| Index | ![Task List](ss/User_Task_Index.png) |

---

### 📅 Presence
| Aksi | Screenshot |
|------|-------------|
| Checkin | ![Checkin Presence](ss/User_Presence_Add.png) |
| Checkout | ![Checkout Presence](ss/User_Presence_Checkout.png) |
| Index | ![Presence List](ss/User_Presence_Index.png) |

---

### 💰 Payroll
| Aksi | Screenshot |
|------|-------------|
| Index | ![Task List](ss/User_Payroll_Index.png) |

---

### 🌴 Cuti
| Aksi | Screenshot |
|------|-------------|
| Add | ![Add Task](ss/User_Cuti_Add.png) |
| Index | ![Task List](ss/User_Cuti_Index.png) |

---

## 🧠 Teknologi yang Digunakan

| Kategori | Teknologi |
|-----------|------------|
| Framework | Laravel 12 |
| Autentikasi | Laravel Breeze |
| Database | MySQL |
| Frontend | Blade Bootstrap 5 |
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
