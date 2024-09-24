<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers'; // Pastikan nama tabel sudah benar
    protected $primaryKey = 'id';   // Pastikan primary key sudah sesuai

    protected $allowedFields = [
        'nama_supplier',
        'kode_supplier',
        'alamat_supplier',
        'pic_nama',
        'pic_email',
        'pic_telepon',
    ];

    // Optional: Set validation rules if needed
    protected $validationRules = [
        'nama_supplier' => 'required',
        'kode_supplier' => 'required|min_length[3]|is_unique[suppliers.kode_supplier]',
        'pic_email' => 'permit_empty|valid_email',
    ];

    // Optional: Set validation messages if needed
    protected $validationMessages = [
        'kode_supplier' => [
            'is_unique' => 'Kode supplier sudah digunakan, harap gunakan kode yang berbeda.'
        ],
    ];

    // Optional: Set return type to array for ease of use with DataTables
    protected $returnType = 'array';

    // Optional: Enable soft deletes if required
    protected $useSoftDeletes = false;

    // Custom function to filter data for DataTables
    public function getFilteredData($searchValue, $start, $length)
    {
        // Adjust query based on search input from DataTables
        if ($searchValue) {
            $this->groupStart()
                ->like('nama_supplier', $searchValue)
                ->orLike('kode_supplier', $searchValue)
                ->orLike('alamat_supplier', $searchValue)
                ->orLike('pic_nama', $searchValue)
                ->orLike('pic_email', $searchValue)
                ->orLike('pic_telepon', $searchValue)
                ->groupEnd();
        }

        // Apply pagination (limit and offset)
        return $this->findAll($length, $start);
    }

    // Function to get the count of total records without filtering
    public function getTotalRecords()
    {
        return $this->countAllResults();
    }

    // Function to get the count of filtered records
    public function getTotalFilteredRecords($searchValue)
    {
        if ($searchValue) {
            $this->groupStart()
                ->like('nama_supplier', $searchValue)
                ->orLike('kode_supplier', $searchValue)
                ->orLike('alamat_supplier', $searchValue)
                ->orLike('pic_nama', $searchValue)
                ->orLike('pic_email', $searchValue)
                ->orLike('pic_telepon', $searchValue)
                ->groupEnd();
        }
        return $this->countAllResults();
    }
}
