# 📘 README – CI/CD Pipeline untuk Gree Project

## 🚀 Arsitektur CI/CD Pipeline
- **Source Control**: GitHub sebagai repository utama.  
- **CI (Continuous Integration)**:  
  - Build otomatis setiap commit/pull request.  
  - Jalankan linting & unit test (`phpunit`).  
- **CD (Continuous Deployment)**:  
  - Deploy otomatis ke **staging** saat merge ke `develop`.  
  - Deploy otomatis ke **production** saat merge ke `main`.  
- **Monitoring**: Notifikasi ke tim (Slack/Email) + logging hasil deployment.  

Diagram sederhana:

```
Developer → GitHub → GitHub Actions → Build/Test → Deploy Staging → Approval → Deploy Production → Monitoring
```

---

## ⚙️ Workflow GitHub Actions
- **Trigger Events**  
  - `push` ke branch `develop` → staging.  
  - `push` ke branch `main` → production.  
  - `pull_request` → validasi sebelum merge.  
- **Jobs**  
  - **Build**: `composer install`, `npm install`, `npm run build`.  
  - **Test**: `phpunit`.  
  - **Deploy**: jalankan script ke server staging/production.  
- **Secrets**: API keys & credentials disimpan di **GitHub Secrets**.  

Contoh snippet workflow:

```yaml
name: CI/CD Pipeline

on:
  push:
    branches: [ "main", "develop" ]
  pull_request:

jobs:
  build:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - run: composer install --no-interaction --prefer-dist --optimize-autoloader
      - run: npm install && npm run build

  test:
    runs-on: ubuntu-latest
    steps:
      - run: php artisan test

  deploy:
    needs: [build, test]
    runs-on: ubuntu-latest
    steps:
      - run: ./scripts/deploy.sh ${{ github.ref }}
```

---

## 🌿 Branching Strategy
- **Main** → branch stabil, hanya berisi kode siap produksi.  
- **Develop** → branch integrasi, otomatis deploy ke staging.  
- **Feature/*** → branch untuk pengembangan fitur.  
- **Hotfix/*** → branch untuk perbaikan cepat di production.  

Alur singkat:
1. Buat branch `feature/xyz` dari `develop`.  
2. Merge ke `develop` via PR setelah review.  
3. Deploy otomatis ke staging.  
4. Jika lolos QA, merge `develop` → `main`.  
5. Deploy otomatis ke production.  

---

## 🏗️ Deployment Staging & Production
- **Staging**  
  - Merge ke `develop` → auto deploy ke server staging.  
  - Digunakan untuk QA & UAT.  
- **Production**  
  - Merge ke `main` → auto deploy ke server production.  
  - Bisa ditambahkan manual approval step.  

---

## 🔄 Mekanisme Rollback
- **Git-based Rollback**  
  - Checkout commit/tag terakhir stabil.  
  - Redeploy artefak dari commit tersebut.  
- **Automated Rollback**  
  - Pipeline revert otomatis jika health check gagal.  
- **Manual Rollback**  
  - Workflow `rollback.yml` untuk redeploy versi sebelumnya.  

Contoh snippet rollback workflow:

```yaml
name: Rollback

on:
  workflow_dispatch:

jobs:
  rollback:
    runs-on: ubuntu-latest
    steps:
      - run: ./scripts/deploy.sh --version=last-stable
```

---

👉 README ini sudah siap dipakai untuk repo kamu. Mau aku tambahkan **diagram visual (misalnya sequence diagram CI/CD)** biar lebih komunikatif untuk timmu?
