# Link Demo Project
https://youtu.be/7Plm6QOHC5s

# Dokumentasi CI/CD Pipeline

## Gree Project

Dokumen ini menjelaskan penerapan **Continuous Integration (CI)** dan **Continuous Deployment (CD)** pada repository **Gree Project**. Proses CI dijalankan menggunakan **GitHub Actions**, sedangkan proses deployment aplikasi dilakukan melalui **Railway** yang terintegrasi langsung dengan repository GitHub.

Seluruh konfigurasi workflow CI berada pada direktori `.github/workflows`.

---

## 1. Arsitektur CI/CD Pipeline

Arsitektur CI/CD pada Gree Project dirancang untuk mengotomatisasi proses validasi kode dan deployment aplikasi secara terstruktur. Alur pipeline adalah sebagai berikut:

```
Pengembang
   ↓
GitHub Repository
   ↓
GitHub Actions (CI: Build & Test)
   ↓
Railway (CD: Auto Deploy)
   ↓
Production Environment
```

Penjelasan komponen:

* **GitHub Repository**
  Digunakan sebagai sistem version control untuk pengelolaan kode sumber.

* **GitHub Actions**
  Berfungsi sebagai proses **Continuous Integration**, yaitu menjalankan build dan pengujian otomatis setiap terjadi perubahan kode.

* **Railway**
  Berperan sebagai platform **Continuous Deployment** yang melakukan deployment aplikasi secara otomatis ketika terdapat perubahan pada branch yang dikonfigurasi.

---

## 2. Penjelasan Workflow GitHub Actions

Workflow CI didefinisikan dalam file berformat `.yml` yang tersimpan pada direktori:

```
.github/workflows/
```

Workflow ini bertugas untuk memastikan kualitas kode sebelum aplikasi dideploy oleh Railway.

### 2.1 Event Pemicu

Workflow dijalankan ketika terjadi:

* **Push** ke branch tertentu
* **Pull request** untuk validasi kode sebelum penggabungan

Event ini memastikan setiap perubahan kode selalu melalui proses build dan pengujian.

---

### 2.2 Proses yang Dijalankan dalam Workflow

Secara umum, workflow GitHub Actions pada project ini menjalankan tahapan berikut:

1. **Checkout Repository**
   Mengambil kode sumber terbaru dari repository.

2. **Instalasi Dependensi**
   Menginstal seluruh dependensi yang dibutuhkan aplikasi.

3. **Build Aplikasi**
   Memastikan aplikasi dapat dibangun tanpa error.

4. **Pengujian Otomatis**
   Menjalankan pengujian untuk memastikan fungsionalitas aplikasi berjalan dengan baik.

> **Catatan:**
> Workflow GitHub Actions **tidak melakukan deployment langsung**. Deployment sepenuhnya ditangani oleh Railway.

---

## 3. Branching Strategy

Strategi branching pada Gree Project disesuaikan dengan kondisi repository yang ada saat ini.

### 3.1 Daftar Branch

| Branch    | Fungsi                                                          |
| --------- | --------------------------------------------------------------- |
| `main`    | Branch utama yang digunakan sebagai acuan deployment production |
| `master`  | Branch lama (legacy)                                            |
| `backend` | Pengembangan fitur backend                                      |
| `login`   | Pengembangan fitur login dan register                           |
| `home`    | Pengembangan halaman home                                       |
| `Home2`   | Pengembangan alternatif halaman home                            |

### 3.2 Alur Pengembangan

1. Pengembangan fitur dilakukan pada branch selain `main`.
2. Setelah fitur selesai, perubahan digabungkan ke branch `main`.
3. Perubahan pada branch `main` akan memicu proses deployment oleh Railway.

---

## 4. Cara Kerja Deployment (Railway)

Deployment aplikasi dilakukan menggunakan **Railway** dengan mekanisme **auto-deploy** yang terintegrasi langsung dengan GitHub.

### 4.1 Environment

Saat ini, proyek hanya memiliki **satu environment**, yaitu:

* **Production**

Tidak terdapat environment staging terpisah.

### 4.2 Proses Deployment

1. Perubahan kode di-*merge* ke branch `main`.
2. Railway mendeteksi perubahan pada repository GitHub.
3. Railway secara otomatis menjalankan proses build dan deployment.
4. Aplikasi diperbarui di lingkungan production.

---

## 5. Mekanisme Rollback

Rollback dilakukan apabila terjadi kesalahan setelah deployment ke production.

### 5.1 Rollback melalui Railway

* Menggunakan **Railway Dashboard** untuk melakukan redeploy ke versi build sebelumnya yang stabil.

### 5.2 Rollback Berbasis Git

* Melakukan *revert* commit bermasalah pada branch `main`.
* Railway akan otomatis melakukan deployment ulang berdasarkan perubahan tersebut.

> Saat ini belum terdapat mekanisme rollback otomatis yang didefinisikan dalam workflow GitHub Actions.

---

## Penutup

Dengan penerapan CI menggunakan GitHub Actions dan CD menggunakan Railway, Gree Project memiliki proses integrasi dan deployment yang terotomatisasi, terstruktur, dan meminimalkan kesalahan manual. Dokumentasi ini disusun sesuai dengan kondisi aktual repository dan konfigurasi yang digunakan.

---
