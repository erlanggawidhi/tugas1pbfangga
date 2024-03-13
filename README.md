
# 220302033
# Erlangga Widhi Pramono
# KELAS TI-2B
## Tugas 1 PBF

Tugas 1 : Push project ci4 ke Github

## > Selamat Datang di Code Igniter 4
CodeIgniter adalah Kerangka Pengembangan Aplikasi atau sebuah toolkit untuk orang-orang yang membangun situs web menggunakan PHP.
### Persyaratan Instalasi
PHP versi 7.4 atau lebih</br > 
PHP Server, Web Server, Database Server (software yang menyediakan : XAMPP)</br >
Visual Studio Code (dengan extension intelehphense untuk pemrograman dengan bahasa PHP)


 ## > Installation
 Instalasi Code Igniter 4 dapat dilakukan dengan dua cara, yaitu instalasi secara manual dan instalasi menggunakan Composer.
 - Instalasi Manual
 1. Download Repositori secara manual dengan link berikut [Framework Code Igniter 4.](https://github.com/CodeIgniter4/framework/releases/tag/v4.4.6)
 2. Extract project ke Root Folder Code Igniter 4 akan disimpan.
 3. Jalankan Server PHP dengan masuk ke dalam root project → code editor (Visual Studio Code) → Terminal → ketik php spark serve.


- Instalasi menggunakan Composer
1. Download terlebih dahulu [Composer](https://getcomposer.org/)
2. Buka folder root yang digunakan untuk menyimpan CodeIgniter, klik kanan lalu buka folder tersebut lewat Terminal.</br >
Ketikkan :
```bash
  composer create-project codeigniter4/appstarter nama-project
```
3. Buka project yang sudah diinstal tadi menggunakan Visual studio code lalu jalankan server dengan masuk ke dalam Terminal. </br >
Ketikkan :
```bash
  php spark serve
```

### Struktur Direktori File Project
- app : Direktori ini berisi kode aplikasi utama yang mencakup model, view, dan controller(MVC).</br >
- public : Menyimpan file-file yang dapat diakses secara publik oleh user (assets), seperti halaman web utama, stylesheet, dan JavaScript.</br >
- tests : Untuk menyimpan unit test dan file-file pengujian lainnya untuk menguji aplikasi.</br >
- writable : Tempat untuk menyimpan file sementara, file log, dan file cache yang dapat ditulis oleh aplikasi.</br >
- vendor : folder depedency dari composer yang biasanya berisikan script aplikasi pihak ketiga.

### Konfigurasi Awal
Menetapkan konfigurasi dasar yang digunakan pada project melalui file app/Config/App.php atau .env
1. Menetapkan nilai URL dasar pada $baseURL (App.php) atau app.baseURL (.env)
```php
public string $baseURL = 'http://localhost/'; //Pastikan untuk menambahkan slash di akhir (App.php)
```
```php
app.baseURL = 'http://localhost/' // (.env)
```
2. Menentukan Index Page
   Jika tidak ingin menyertakan tampilan /index.php di URL, atur $indexPage ke '' pada app/Config/App.php.
```php
public string $indexPage = '';
```
3. Mengubah Code Igniter menjadi Mode Development
Atur CI_ENVIRONMENT ke development dalam file .env untuk memanfaatkan alat debugging.
```php
CI_ENVIRONMENT = development //pastikan (# Komentar) sudah dihapus/dinonaktifkan.
```
4. Menjalankan Server Code Igniter dengan terminal/command prompt
```bash
php spark serve
```
5. Menambahkan Alias Host
  - Mengaktifkan vhost_alias_module</br >
Pastikan modul virtual hosting diaktifkan (tidak dikomentari) di file konfigurasi utama, pada XAMPP buka Menu→Apache→httpd.conf :
```bash
LoadModule vhost_alias_module modules/mod_vhost_alias.so //pastikan (# Komentar) sudah dihapus/dinonaktifkan.
```
  - Tambahkan alias host di file “hosts” yang lokasi filenya biasanya berada di C:\Windows\System32\drivers\etc
```bash
127.0.0.1 anggaci4.test //saya menambahkan host custom
```
6. Menentukan port server yang akan dijalankan
Secara default, server localhost berjalan pada port 8080 tetapi bisa dirubah menggunakan perintah --port.
```bash
php spark serve --port 8888 //Pastikan port yang digunakan tidak digunakan oleh aplikasi lain
```

### Ugrade dan Downgrade Versi Framework
Masuk kedalam file composer.json.
- Downgrade Framework
```json
  "require": {
    "php": "^7.4 || ^8.0",
    "codeigniter4/framework": "4.4.4"
//misalnya disini versi framework didowngrade ke versi 4.4.4
//defaultnya "^4.4.6" ada tanda "^",  hapus tanda "^" tersebut
  },
```
Lalu ketikkan perintah berikut pada terminal/command prompt
```bash
$composer update //update composer dengan versi yang baru
$php spark --version //cek versi framework
```
- Upgrade Framework
```json
"require": {
"php": "^7.4 || ^8.0",
"codeigniter4/framework": "4.4.6"
  },
//misalnya disini versi framework diupgrade ke versi 4.4.6
```
Lalu ketikkan perintah berikut pada terminal/command prompt
```bash
$composer update //update composer dengan versi yang baru
$php spark --version //cek versi framework
```

## > Build Your First Application
Setelah CodeIgniter 4 selesai di install, Setting Development Mode, lalu menjalankan server, ini merupakan tahapan sebelumnya.
- Halaman Error/Kesalahan</br >
  Buka app/Controllers/Home.php dan ubah beberapa baris untuk menghasilkan kesalahan (menghapus titik koma atau kurung kurawal.
  ![Screenshot 2024-03-13 104639](https://github.com/erlanggawidhi/erlanggawidhici4/assets/134033017/b2a1aa65-6dd5-4b1c-a361-a9230ce36571)</br >
  Maka akan muncul error ketika web direfresh.</br >
1. Mengarahkan kursor ke header merah di bagian atas akan menampilkan tautan ”[**search→**](https://www.duckduckgo.com/?q=ParseError+syntax+error%2C+unexpected+token+%2C+expecting+)” yang akan membuka DuckDuckGo.com di tab baru dan mencari pengecualian.
2. Mengklik link **argumen** pada baris mana pun di Backtrace akan memperluas daftar argumen yang diteruskan ke pemanggilan fungsi tersebut.

- Static Pages
#### Buat Controller Halaman
1. Buat file di app/Controllers/Pages.php dengan kode berikut.
```PHP
<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        // ...
    }
}
```
2. Buka file rute yang terletak di app/Config/Routes.php.</br >
Tambahkan baris berikut, untuk meyambungkan dengan Pages.php yang diControllers.
```PHP
use App\Controllers\Pages;

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
#### Buat Tampilan
- Buat folder baru templates dan file header.php didalamnya, pada folder `app/Views`**.**</br>
Tambahkan kode berikut:
```PHP
<!doctype html>
<html>

<head>
    <title>CodeIgniter Tutorial</title>
</head>

<body>

    <h1><?= esc($title) ?></h1>
    <!-- esc fungsi global yang disediakan oleh CodeIgniter untuk membantu mencegah serangan XSS -->
```
- Sekarang, buat footer di app/Views/templates/footer.php
```PHP
<footer>ini footer</footer>
<em>&copy; 2024</em>
</body>

</html>
```
#### Menambahkan Logika ke Controller
Buat folder pages di app/Views/ lalu buat dua file bernama home.php dan about.php pada app/Views/pages.
- home.php :
```PHP
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <h1>Welcome to the Home Page</h1>
</body>

</html>
```
- about.php :
```PHP
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
</head>

<body>
    <h1>Tetang saya</h1>
    <p>Ini adalah halaman tentang situs web.</p>
</body>

</html>
```
- Pada file app/controllers/Pages.php
```PHP
<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        // ...
    }
}
```
Lengkapi kode tersebut dengan
```PHP
<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; //untuk mengimpor kelas PageNotFoundException
//CodeIgniter\Exceptions. tidak ada folder fisik yang secara langsung menampungnya di struktur proyek standar ini berasal dari default sistem ci

class Pages extends BaseController
{
		//http://localhost:8080/pages menampilkan index() welcome_message
    public function index()
    {
        // Menampilkan halaman utama (welcome_message.php)
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        //.. Tambahan code

        // Mengecek apakah halaman yang diminta ada
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Jika tidak ada, lempar PageNotFoundException
            throw new PageNotFoundException($page);
        }

        // Mengatur judul halaman berdasarkan nama halaman
        $data['title'] = ucfirst($page); // Kapitalkan huruf pertama

        // Memuat template header, halaman statis (home, about), dan footer
        return view('templates/header', $data)
            . view('pages/' . $page, $data)
            . view('templates/footer');
    }
}

```

- News Section</br>
Buat Database dengan nama ci4
1. Buat Tabel
```SQL
CREATE TABLE news (
    id INT AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    description VARCHAR(128) NOT NULL,
    body TEXT NOT NULL,
    PRIMARY KEY (id)
);
```
2. Insert Data
```SQL
INSERT INTO news (title, description, body) VALUES 
('Pembukaan Pameran Seni', 'Pameran seni lokal', 'Pameran seni lokal dibuka pada hari Minggu di pusat seni kota. Acara ini menampilkan karya seni dari seniman lokal.'),
('Peluncuran Buku Baru', 'Buku terbaru dari penulis terkenal', 'Penulis terkenal meluncurkan buku terbarunya dalam sebuah acara di toko buku utama kota. Buku ini mendapatkan pujian luas dari para kritikus.'),
('Konser Musik Outdoor', 'Penampilan musik langsung di taman kota', 'Acara konser musik outdoor akan diadakan di taman kota pada akhir pekan ini. Banyak musisi lokal dan internasional akan tampil di acara tersebut.')
;
```
3. Hubungkan ke Database </br>
Pada file .env hilangkan comment (#) dan ganti database
```SQL
#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = ci4
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```
4. Buat Model News </br>
Buka direktori `app/Models` dan buat file baru bernama `NewsModel.php` dan tambahkan kode berikut
```PHP
<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
}
```
Ini akan membuat kelas database tersedia melalui $this->db objek.</br>
5. Tambahkan Method NewsModel::getNews() pada app/Models
```PHP
    public function getNews($description = false)
    {
        if ($description === false) {
            return $this->findAll();
        }

        return $this->where(['description' => $description])->first();
    }
```
Menjadi
```PHP
<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';


    public function getNews($description = false)
    {
        if ($description === false) {
            return $this->findAll();
        }

        return $this->where(['description' => $description])->first();
    }
}
```
6. Menambahkan Routing Files</br>
Ubah file app/Config/Routes.php , sehingga terlihat seperti berikut:
```PHP
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

use App\Controllers\Pages;
use App\Controllers\News; // Tambah baris ini

$routes->get('news', [News::class, 'index']);           // Tambah baris ini
$routes->get('news/(:segment)', [News::class, 'show']); // Tambah baris ini

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
7. Tambahkan News Controller</br>
   Buat controller baru di app/Controllers/News.php.
```PHP
<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews();
    }

    public function show($description= null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($description);
    }
}
```
8. Lengkapi Method News::index()
```PHP
<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException; //baru

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews(),
            'title' => 'Berita',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }
    //..
    public function show($description= null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($description);
    }
}
```
9. Buat tampilan untuk app/Views/news/index.php
```PHP
<h2><?= esc($title) ?></h2>

<?php if (!empty($news) && is_array($news)) : ?>

    <?php foreach ($news as $news_item) : ?>

        <h3><?= esc($news_item['title']) ?></h3>

        <div class="main">
            <?= esc($news_item['body']) ?>
        </div>
        <p><a href="/news/<?= esc($news_item['description'], 'url') ?>">View article</a></p> <!-- Terhubung ke controllers News.php public function show($description = null) -->

    <?php endforeach ?>

<?php else : ?>

    <h3>No Berita</h3>

    <p>Tidak dapat menemukan berita apa pun untuk Anda.</p>

<?php endif ?>
```
10. Lengkapi Method News::show() pada app/controllers/News.php
```PHP
<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException; //baru

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews(),
            'title' => 'Berita',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }

    //.. Dari sini News::show()
		// sebagai pencarian berita berdasarkan deskripsi
		
    public function show($description = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($description);
        if (empty($data['news'])) {
            throw new PageNotFoundException('Tidak dapat menemukan item berita: ' . $description);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }
}
```
11. Membuat tampilan terkait di app/Views/news/view.php
```PHP
// Menampilkan judul berita. Fungsi 'esc' digunakan untuk mencegah serangan XSS.
<h2><?= esc($news['title']) ?></h2>

// Menampilkan isi berita. Fungsi 'esc' juga digunakan di sini untuk mencegah serangan XSS.
<p><?= esc($news['body']) ?></p>
```
- Create News Item
1. Aktifkan Filter CSRF</br>
Buka file app/Config/Filters.php dan perbarui $methods properti seperti berikut :
```PHP
<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    // ... ini

    public $methods = [
        'post' => ['csrf'],
    ];

    // ...
}
```
2. Menambahkan Routing Rules</br>
Menambahkan rule tambahan ke file app/Config/Routes.php .
```PHP
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

use App\Controllers\Pages;
use App\Controllers\News; // Tambah baris ini

$routes->get('news', [News::class, 'index']);           // Tambah baris ini

$routes->get('news/new', [News::class, 'new']); // Tambah baris ini (poin create News items)
$routes->post('news', [News::class, 'create']); // Tambah baris ini (poin create News items)

$routes->get('news/(:segment)', [News::class, 'show']); // Tambah baris ini

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
3. Buat Formulir</br>
Buat tampilan baru di app/Views/news/create.php :
```PHP
<!-- Poin 3 pada Create News Items (Bangun aplikasi pertama) -->
<!-- Menampilkan judul halaman dengan melakukan escape terhadap variabel $title untuk mencegah XSS -->
<h2><?= esc($title) ?></h2>

<!-- Menampilkan pesan error yang disimpan dalam session jika ada -->
<?= session()->getFlashdata('error') ?>

<!-- Menampilkan daftar kesalahan validasi jika ada -->
<?= validation_list_errors() ?>

<!-- Membuat form dengan metode POST yang akan mengirim data ke URL /news -->
<form action="/news" method="post">

    <!-- Membuat field CSRF untuk mencegah serangan CSRF -->
    <?= csrf_field() ?>

    <!-- Membuat label untuk field judul -->
    <label for="title">Title</label>
    <!-- Membuat field input untuk judul, dengan nilai default dari fungsi set_value() -->
    <input type="input" name="title" value="<?= set_value('title') ?>">

    <br> <!-- Membuat baris baru -->

    <label for="body">Text</label> <!-- Membuat label untuk field teks -->
    <!-- Membuat field textarea untuk teks, dengan nilai default dari fungsi set_value() -->
    <textarea name="body" cols="45" rows="4"><?= set_value('body') ?></textarea>

    <br> <!-- Membuat baris baru -->

    <input type="submit" name="submit" value="Create news item"> <!-- Membuat tombol submit -->
</form> <!-- Menutup tag form -->
<!-- END Dari Poin 3 pada Create News Items (Bangun aplikasi pertama Anda) -->
```
4. News Controller</br>
Tambahkan **`News::new()`** pada `app/controllers/News.php`untuk Menampilkan Formulir.</br>
Pertama, buatlah metode untuk menampilkan form HTML yang telah buat.
```PHP
<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
		// ... Dari Poin pembahasan Create News Items (Bangun aplikasi pertama Anda)
    // Terhubung News::create() diViews
    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/create')
            . view('templates/footer');
    }
    // ...
}
```
5. Tambahkan News::create() pada app/controllers/News.php untuk Membuat Items Berita
```PHP
<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    // ...
		// Dari Poin 5 pembahasan Create News Items (Bangun aplikasi pertama Anda)
    public function create()
    {
        helper('form'); // Memanggil helper form

        $data = $this->request->getPost(['title', 'body']); // Mengambil data dari form

        // Mengecek apakah data yang dikirimkan memenuhi aturan validasi.
        if (!$this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]', // Judul harus ada, maksimal 255 karakter, minimal 3 karakter
            'body'  => 'required|max_length[5000]|min_length[10]', // Isi berita harus ada, maksimal 5000 karakter, minimal 10 karakter
        ])) {
            // Jika validasi gagal, kembali ke form.
            return $this->new();
        }

        // Mengambil data yang telah divalidasi.
        $post = $this->validator->getValidated();

        $model = model(NewsModel::class); // Membuat instance dari NewsModel

        // Menyimpan data ke dalam database
        $model->save([
            'title' => $post['title'], // Menyimpan judul
            'description'  => url_title($post['title'], '-', true), // Membuat deskripsi dari judul
            'body'  => $post['body'], // Menyimpan isi berita
        ]);

        // Menampilkan halaman sukses setelah data berhasil disimpan
        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/success')
            . view('templates/footer');
    }
    //...
}
```
6. Buat tampilan di app/Views/news/success.php dan tulis pesan sukses.
```PHP
<p>News item created successfully.</p>
```
7. Edit NewsModel → app/Models/NewsModel.php untuk memberikannya daftar bidang yang dapat diperbarui di $allowedFields properti.
```PHP
<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    //pembahasan poin 7 pada Create News Items (Bangun aplikasi pertama Anda)
    protected $allowedFields = ['title', 'description', 'body'];
    //...
}
```
Menjadi
```PHP
<?php

namespace App\Models;

use CodeIgniter\Model;

// Kelas NewsModel mewarisi kelas Model dari CodeIgniter
class NewsModel extends Model
{
    // Variabel $table digunakan untuk mendefinisikan tabel yang digunakan oleh model ini
    protected $table = 'news';

    // Variabel $allowedFields mendefinisikan field apa saja yang dapat diisi dalam tabel
    // Ini adalah bagian dari fitur mass assignment protection di CodeIgniter
    //Pembahasan poin 7 pada Create News Items (Bangun aplikasi pertama Anda)
    protected $allowedFields = ['title', 'slug', 'body'];
    //...

    // Fungsi getNews digunakan untuk mengambil data berita
    // Jika parameter $description bernilai false, maka fungsi akan mengembalikan semua berita
    // Jika parameter $description memiliki nilai, maka fungsi akan mencari berita dengan deskripsi yang sesuai
    public function getNews($description = false)
    {
        if ($description === false) {
            return $this->findAll();
        }

        return $this->where(['description' => $description])->first();
    }
}
```
8. Buat Item Berita</br>
![Screenshot 2024-03-13 123905](https://github.com/erlanggawidhi/erlanggawidhici4/assets/134033017/a2180832-5050-46d3-b3c7-e5b0ac8575d7)
![image](https://github.com/erlanggawidhi/erlanggawidhici4/assets/134033017/0c99c2e8-6b71-4b21-b0bb-62b0d3e5d0fd)

