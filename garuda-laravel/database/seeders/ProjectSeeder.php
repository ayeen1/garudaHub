<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [2, 1, 'Website Toko Batik Online', 'Membutuhkan toko online dengan katalog produk, keranjang, dan halaman kontak. Desain responsif.', 5000000, 10000000, '2027-12-31', 'open'],
            [2, 2, 'Aplikasi Kasir Android', 'Aplikasi kasir sederhana untuk warung: catat transaksi, laporan harian, cetak struk via Bluetooth.', 8000000, 15000000, '2027-11-30', 'open'],
            [3, 3, 'Redesain Logo dan UI Kit', 'Redesain identitas visual startup kuliner beserta UI kit untuk aplikasi pemesanan.', 2000000, 4000000, '2026-09-01', 'awarded'],
            [3, 4, 'Dashboard Analitik Penjualan', 'Dashboard grafik penjualan bulanan dari file CSV, dengan filter per cabang dan ekspor laporan.', 6000000, 12000000, '2027-10-15', 'open'],
            [4, 5, 'Chatbot Layanan Pelanggan', 'Chatbot FAQ untuk situs sekolah, dapat dijawab dalam bahasa Indonesia.', 4000000, 8000000, '2026-08-20', 'open'],
            [4, 1, 'Sistem Absensi Sekolah', 'Sistem absensi siswa berbasis web dengan rekap per kelas dan laporan bulanan untuk wali kelas.', 7000000, 14000000, '2026-07-10', 'awarded'],
            [2, 4, 'Migrasi Database ke MySQL', 'Memindahkan data inventaris dari spreadsheet ke MySQL dan membuat skrip impor.', 3000000, 6000000, '2026-06-30', 'awarded'],
            [3, 1, 'Landing Page Event Kampus', 'Satu halaman informasi acara seminar teknologi dengan formulir pendaftaran sederhana.', 1500000, 3000000, '2027-09-01', 'open'],
        ];

        foreach ($projects as [$client, $kategori, $judul, $desk, $min, $max, $deadline, $status]) {
            Project::create([
                'client_id' => $client,
                'category_id' => $kategori,
                'title' => $judul,
                'description' => $desk,
                'budget_min' => $min,
                'budget_max' => $max,
                'deadline' => $deadline,
                'status' => $status,
            ]);
        }
    }
}
