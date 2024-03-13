<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model // Kelas NewsModel mewarisi kelas Model dari CodeIgniter
{

    protected $table = 'news'; // Variabel $table digunakan untuk mendefinisikan tabel yang digunakan oleh model ini

    // Variabel $allowedFields mendefinisikan field apa saja yang dapat diisi dalam tabel
    // Ini adalah bagian dari fitur mass assignment protection di CodeIgniter
    protected $allowedFields = ['title', 'description', 'body']; //pembahasan poin 7 pada Create News Items (Bangun aplikasi pertama Anda)

    public function getNews($description = false)    // Fungsi getNews digunakan untuk mengambil data berita
    {
        if ($description === false) {   // Jika parameter $description bernilai false, maka fungsi akan mengembalikan semua berita
            return $this->findAll();
        }

        return $this->where(['description' => $description])->first();  // Jika parameter $description memiliki nilai, maka fungsi akan mencari berita dengan deskripsi yang sesuai
    }
}
