<?php

namespace Database\Seeders;

use App\Models\Bid;
use App\Models\Project;
use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    public function run(): void
    {
        $bids = [
            [1, 5, 8500000, 30, 'Saya akan membangun dengan PHP dan MySQL, lengkap dengan panel admin produk.'],
            [1, 6, 7000000, 40, 'Pengalaman 3 tahun membuat toko online. Termasuk pelatihan penggunaan.'],
            [1, 7, 9500000, 25, 'Desain premium bernuansa batik, dukungan perawatan 3 bulan.'],
            [2, 5, 12000000, 45, 'Aplikasi native Kotlin, dukungan printer Bluetooth termasuk.'],
            [2, 8, 10000000, 50, 'Memakai Flutter agar bisa juga dipakai di iOS nanti.'],
            [3, 6, 3000000, 14, 'Tiga konsep logo dan UI kit lengkap di Figma.'],
            [3, 7, 3500000, 10, 'Revisi tak terbatas selama 2 minggu.'],
            [4, 8, 9000000, 35, 'Dashboard dengan Chart dan ekspor PDF.'],
            [4, 5, 11000000, 30, 'Termasuk modul impor CSV otomatis.'],
            [4, 6, 7500000, 45, 'Fokus pada grafik interaktif dan filter cabang.'],
            [5, 7, 6000000, 30, 'Chatbot berbasis aturan dengan basis pengetahuan FAQ sekolah.'],
            [6, 8, 11000000, 40, 'Sistem lengkap dengan rekap otomatis dan ekspor Excel.'],
            [6, 5, 13000000, 35, 'Termasuk aplikasi pemindai kode QR untuk absensi.'],
            [7, 6, 4500000, 15, 'Skrip impor dengan validasi data dan laporan galat.'],
            [7, 7, 5000000, 12, 'Termasuk dokumentasi skema dan pelatihan singkat.'],
        ];

        foreach ($bids as [$project, $developer, $harga, $durasi, $proposal]) {
            Bid::create([
                'project_id' => $project,
                'developer_id' => $developer,
                'price' => $harga,
                'duration_days' => $durasi,
                'proposal' => $proposal,
            ]);
        }

        Project::find(3)->update(['winning_bid_id' => 6]);
        Project::find(6)->update(['winning_bid_id' => 12]);
        Project::find(7)->update(['winning_bid_id' => 14]);
    }
}
