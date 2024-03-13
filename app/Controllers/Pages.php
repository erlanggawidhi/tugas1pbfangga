<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; //untuk mengimpor kelas PageNotFoundException
//CodeIgniter\Exceptions. tidak ada folder fisik yang secara langsung menampungnya di struktur proyek standar ini berasal dari default sistem ci

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
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
