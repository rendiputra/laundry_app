# laundry_app

Soal Ujian Kompetensi Keahlian SMK RPL Tahun 2020 : [Lihat Disini](https://docs.google.com/document/d/1lAskWGNuy75HYMhdJVQprNRZEUAYRnooDvTHq_QHdkc/edit?usp=sharing)

## Cara Instalasi:
### 1. Dumping db db_laundry.sql

### 2. Configurasi env
```bash
$ cp .env.example .env
```

### 3. Install semua depency menggunakan composer

```bash 
$ composer install
```

### 4. Generate a new application key 
```bash 
$ php artisan key:generate
```

### 5. Start the local development server
```bash
$ php artisan serve
```
# Rangkuman command


```bash 
$ git clone https://github.com/rendiputra/laundry_app.git
$ cd laundry_app
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan serve
```