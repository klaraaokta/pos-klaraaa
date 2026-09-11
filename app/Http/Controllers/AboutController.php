<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    /**
     * Menampilkan halaman About (profil pembuat & info aplikasi).
     * Hanya bisa diakses oleh admin (lihat middleware 'role:admin' di web.php).
     */
    public function index()
    {
        return view('about');
    }
}