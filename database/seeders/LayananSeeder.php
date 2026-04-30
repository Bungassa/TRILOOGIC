<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanans = [
            [
                'nama' => 'Full Body Reflexyologi & Massage (60 menit)',
                'deskripsi' => 'Perawatan pijat seluruh tubuh yang dikombinasikan dengan teknik refleksiologi pada titik-titik tertentu untuk membantu melancarkan peredaran darah, mengurangi pegal-pegal, serta memberikan efek relaksasi dalam durasi 60 menit.',
                'harga' => 80000,
                'gambar' => 'assets/img/service_1.jpg',
            ],
            [
                'nama' => 'Full Body Reflexyologi & Massage (90 menit)',
                'deskripsi' => 'Layanan pijat seluruh tubuh dengan tambahan teknik refleksiologi yang dilakukan lebih lama selama 90 menit, sehingga membantu meredakan stres, mengurangi ketegangan otot, dan memberikan relaksasi yang lebih maksimal.',
                'harga' => 120000,
                'gambar' => 'assets/img/service_2.jpg',
            ],
            [
                'nama' => 'Full Body Massage + Totok Wajah',
                'deskripsi' => 'Perawatan pijat seluruh tubuh yang dikombinasikan dengan terapi totok wajah, yaitu teknik penekanan pada titik-titik tertentu di wajah untuk melancarkan sirkulasi darah, membantu meremajakan kulit, dan membuat wajah terasa lebih segar.',
                'harga' => 110000,
                'gambar' => 'assets/img/service_3.webp',
            ],
            [
                'nama' => 'Full Body Massage + Lulur/Scrub',
                'deskripsi' => 'Layanan pijat seluruh tubuh yang dilengkapi dengan perawatan lulur atau scrub untuk membantu mengangkat sel kulit mati, membersihkan pori-pori, serta membuat kulit terasa lebih halus, bersih, dan cerah.',
                'harga' => 130000,
                'gambar' => 'assets/img/service_4.jpg',
            ],
            [
                'nama' => 'Full Body Massage + Totok Wajah + Scrub',
                'deskripsi' => 'Paket perawatan lengkap yang menggabungkan pijat seluruh tubuh, terapi totok wajah, dan lulur atau scrub, sehingga memberikan manfaat relaksasi sekaligus perawatan kulit secara menyeluruh.',
                'harga' => 140000,
                'gambar' => 'assets/img/service_5.jpeg',
            ],
            [
                'nama' => 'Head Shoulder Massage',
                'deskripsi' => 'Pijat yang difokuskan pada area kepala, leher, dan bahu untuk membantu mengurangi ketegangan otot, meredakan sakit kepala, serta memberikan rasa nyaman dan relaksasi.',
                'harga' => 40000,
                'gambar' => 'assets/img/service_6.jpeg',
            ],
            [
                'nama' => 'Back Massage',
                'deskripsi' => 'Layanan pijat pada area punggung yang bertujuan untuk meredakan nyeri otot, mengurangi pegal-pegal akibat aktivitas sehari-hari, serta membantu memperbaiki sirkulasi darah.',
                'harga' => 40000,
                'gambar' => 'assets/img/service_7.jpeg',
            ],
            [
                'nama' => 'Foot Massage',
                'deskripsi' => 'Pijat pada area kaki dengan teknik refleksiologi yang menekan titik-titik tertentu untuk membantu melancarkan peredaran darah, mengurangi kelelahan, dan memberikan efek relaksasi.',
                'harga' => 40000,
                'gambar' => 'assets/img/service_8.jpeg',
            ],
            [
                'nama' => 'Lulur/Scrub Full Body',
                'deskripsi' => 'Perawatan lulur atau scrub seluruh tubuh yang bertujuan untuk mengangkat sel kulit mati, membersihkan kulit secara menyeluruh, serta membuat kulit terasa lebih halus, cerah, dan segar.',
                'harga' => 50000,
                'gambar' => 'assets/img/service_9.jpeg',
            ],
            [
                'nama' => 'Totok Wajah Tradisional',
                'deskripsi' => 'Teknik perawatan wajah tradisional dengan penekanan pada titik-titik tertentu untuk membantu melancarkan sirkulasi darah, menjaga kesehatan kulit wajah, serta membuat wajah tampak lebih segar.',
                'harga' => 30000,
                'gambar' => 'assets/img/service_10.jpeg',
            ],
            [
                'nama' => 'Kerokan',
                'deskripsi' => 'Terapi tradisional dengan teknik gesekan menggunakan alat khusus pada permukaan kulit untuk membantu meredakan masuk angin, pegal-pegal, dan meningkatkan rasa nyaman pada tubuh.',
                'harga' => 20000,
                'gambar' => 'assets/img/service_11.jpeg',
            ],
            [
                'nama' => 'Home Service Massage',
                'deskripsi' => 'Layanan pijat yang dilakukan langsung di rumah pelanggan, sehingga memberikan kenyamanan lebih tanpa perlu datang ke lokasi, cocok bagi pelanggan yang ingin relaksasi di tempat sendiri.',
                'harga' => 100000,
                'gambar' => 'assets/img/service_12.jpeg',
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::create($layanan);
        }
    }
}
