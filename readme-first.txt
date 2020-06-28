Project Specification:
PHP : v.7.2.5,
MySql : v.5.7
Laravel(Framework) : v.7.0,
Bootstrap : 4.4.1
Apache : 7.3.12,

APP Requirement:
XAMPP : v.3.2.4 or higher
PHPMyAdmin : 4.9.2
Composer : 1.6.4 or higher

Step by step :
1.Install NPM , XAMPP , dan Composer jika belum punya
2.Jika sudah install jalan XAMPP ( start apache dan mysql )
2.Clone Project ke Komputer Local
3.Jalankan cmd,dan pindah directory ke directory project
4.Jalankan command : "composer install"
5.Setelah install selesai, jalankan command : "copy .env.example .env"
6.Kemudian jalankan command : "php artisan key:generate"
7.Setting file .env ( database dan mailer )
7.1 Database create terlebih dahulu di mysql , dan setting username dan password sesuai root database anda
8.Kemudian jalankan  command : "php artisan migrate"
9.Setelah migrate jalankan command : "php artisan db:seed" (optional : untuk memasukkan data dummy)
10.Jalankan laravel dengan command : "php artisan serve"
11.buka browser di "localhost:8000"
12.Done