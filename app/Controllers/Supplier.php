<?php

namespace App\Controllers;

use App\Models\SupplierModel;
use CodeIgniter\Controller;

class Supplier extends Controller
{
    protected $supplierModel;
    protected $pager;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
        $this->pager = \Config\Services::pager();
    }

    // Method untuk menampilkan daftar supplier dengan paginasi
    public function index()
    {
        // Ambil data supplier dengan pagination, 10 data per halaman
        $data = [
            'title' => 'Data Supplier',
            'suppliers' => $this->supplierModel->paginate(10), // Pagination dengan 10 data per halaman
            'pager' => $this->supplierModel->pager // Menggunakan pager bawaan CodeIgniter
        ];

        return view('supplier/index', $data);
    }

    // Method untuk menampilkan form tambah supplier
    public function create()
    {
        $data = ['title' => 'Tambah Supplier'];
        return view('supplier/create', $data);
    }

    // Method untuk menyimpan data supplier baru
    public function store()
    {
        if (!$this->validate([
            'nama_supplier' => 'required',
            'kode_supplier' => 'required|min_length[3]|is_unique[suppliers.kode_supplier]',
            'pic_email' => 'permit_empty|valid_email'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->supplierModel->save([
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'kode_supplier' => $this->request->getPost('kode_supplier'),
            'alamat_supplier' => $this->request->getPost('alamat_supplier'),
            'pic_nama' => $this->request->getPost('pic_nama'),
            'pic_email' => $this->request->getPost('pic_email'),
            'pic_telepon' => $this->request->getPost('pic_telepon')
        ]);

        return redirect()->to('/supplier')->with('success', 'Supplier berhasil ditambahkan.');
    }

    // Method untuk menampilkan form edit supplier
    public function edit($id)
    {
        $supplier = $this->supplierModel->find($id);
        if (!$supplier) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Supplier tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Supplier',
            'supplier' => $supplier
        ];

        return view('supplier/edit', $data);
    }

    // Method untuk mengupdate data supplier
    public function update($id)
    {
        if (!$this->validate([
            'nama_supplier' => 'required',
            'kode_supplier' => 'required|min_length[3]|is_unique[suppliers.kode_supplier,id,{id}]',
            'pic_email' => 'permit_empty|valid_email'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->supplierModel->update($id, [
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'kode_supplier' => $this->request->getPost('kode_supplier'),
            'alamat_supplier' => $this->request->getPost('alamat_supplier'),
            'pic_nama' => $this->request->getPost('pic_nama'),
            'pic_email' => $this->request->getPost('pic_email'),
            'pic_telepon' => $this->request->getPost('pic_telepon')
        ]);

        return redirect()->to('/supplier')->with('success', 'Supplier berhasil diupdate.');
    }

    // Method untuk menghapus data supplier
    public function delete($id)
    {
        $this->supplierModel->delete($id);
        return redirect()->to('/supplier')->with('success', 'Supplier berhasil dihapus.');
    }
}