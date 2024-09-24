<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // Data yang akan dikirim ke view
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
            'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'pagetitle' => 'Minible']),
        ];

        // Memuat view index.php dari template Minible
        return view('index', $data);
    }
}
