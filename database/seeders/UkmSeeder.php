<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ukms')->insert([
            [
                'id' => 1,
                'name' => 'Unit Karate Unpad',
                'short_name' => 'UKU',
                'desc' => 'Unit Karate Unpad (UKU)  merupakan unit kegiatan mahasiswa yang bergerak dalam bidang seni bela diri karate. Pada awalnya UKU merupakan komunitas yang didirikan oleh para atlet yang mengenyam pendidikan di Unpad, agar mereka tetap bisa latihan bersama di tengah kesibukan kuliah. Namun seiring berjalannya waktu, akhirnya komunitas tersebut berkembang menjadi unit kegiatan mahasiswa. 
                
                UKU melakukan latihan rutin pada Senin & Jumat mulai pukul 16.00 WIB di Stadion Jati Padjadjaran serta Selasa & Kamis mulai pukul 16.00 WIB di pelataran kampus Fakultas Hukum Unpad. 
                
                Selain latihan rutin, kegiatan yang dilaksanakan UKU adalah mengikuti  kejuaraan-kejuaraan di berbagai tingkat, baik regional maupun nasional, serta perkumpulan formal dan informal untuk menyolidkan anggota-anggota UKU. 
                
                Unit Karate Unpad membuka peluang sebesar-besarnya bagi mahasiswa maupun non-mahasiswa Unpad untuk bergabung dalam UKU sekali pun tanpa memiliki kemampuan dasar dalam karate. UKU juga memahami perbedaan aliran dan perguruan dalam karate yang memberikan kemungkinan perbedaan basis bagi setiap anggota. Dengan pemahaman ini, UKU tidak mendiskriminasikan perbedaan yang memang ada. Latihan bersama dilakukan sesuai jadwal bagi setiap anggota meskipun dengan perguruan dan aliran yang berbeda-beda.',
                'category' => 'Bela diri',
                'avatar' => 'assets/ukm/logo/UKU.jpg',
                'date' => 'Senin, Selasa, Kamis, dan Jumat pukul 16.00 WIB',
                'member' => 'Lebih dari 30 orang',
                'location' => 'Stadion Jati Padjadjaran dan pelataran kampus Fakultas Hukum Unpad',
                'contact' => 'unitkarateunpad@yahoo.com',
            ],
            [
                'id' => 2,
                'name' => 'Merpati Putih Unpad',
                'short_name' => 'MPUP',
                'desc' => 'UKM Merpati Putih Unpad diresmikan pada tahun 1996. UKM Merpati Putih Unpad sering mengikuti kejuaraan-kejuaraan pencak silat, baik ditingkat regional maupun nasional. Dari keikutsertaan beberapa kejuaraan yang diikuti, UKM Merpati Putih Unpad berhasil meraih beberapa prestasi yang membanggakan. 
                
                UKM Merpati Putih Unpad ini terbagi ke dalam dua kelompok latihan, yaitu di Jatinangor dan Dipati Ukur, Bandung. Jadwal latihan di kolat Jatinangor adalah setiap Senin-Kamis mulai pukul 16.00 WIB, sementara di Dipati Ukur setiap Rabu mulai pukul 16.00 WIB dan Minggu pukul 08.00 WIB. Keunggulan dari Merpati Putih ialah, terletak pada teknik pernafasan dan tenaga dalam yang selalu dilatih pada setiap kali latihan reguler dilaksanakan. Tehnik pernafasan Merpati Putih tidak hanya berguna bagi power penggunanya, tetapi juga berguna bagi kesehatan.',
                'category' => 'Bela diri',
                'avatar' => 'assets/ukm/logo/MPUP.jpg',
                'date' => 'Senin & Kamis pukul 16.00 WIB',
                'member' => 'Lebih dari 40 orang',
                'location' => 'Kolat Jatinangor',
                'contact' => 'merpatiputih_unpad@yahoo.co.id',
            ],
            [
                'id' => 3,
                'name' => 'Unit Bulu Tangkis Unpad',
                'short_name' => 'UBTU',
                'desc' => 'Unit Bulu Tangkis Unpad (UBTU) didirikan pada 19 Desember 1986. Pada perkembangannya, UBTU tidak hanya sebagai tempat berkumpul mahasiswa yang hobi bermain bulu tangkis saja, namun untuk menampung dan mengembangkan potensi yang dimiliki mahasiswa Unpad dalam bidang bulu tangkis. UBTU juga tidak hanya untuk mahasiswa Unpad yang telah mahir dalam bermain bulu tangkis. Mahasiswa Unpad yang ingin belajar dalam keorganisasian (managerial) UBTU juga dapat bergabung. Tidak ada persyaratan khusus untuk menjadi anggota UBTU, cukup dengan registrasi awal.
                
                Latihan rutin dilaksanakan setiap hari Senin dan Jumat pukul 16.00 WIB di Badminton Hall Bale Santika, Kamis pukul 20.00 di GOR Cileunyi Wetan, serta hari Minggu pukul 13.00 WIB di GOR Prestasi Bandung. Selain itu, diselenggarakan juga kegiatan tahunan, yakni UBTU FUN yang digelar untuk mempererat tali kekeluargaan sesama anggota UBTU, dan acara UBTU OPEN, merupakan turnamen tingkat Unpad perorangan antar fakultas yang rutin diadakan setiap satu tahun sekali.',
                'category' => 'Olahraga',
                'avatar' => 'assets/ukm/logo/UBTU.jpg',
                'date' => 'Senin & Jumat pukul 16.00 WIB, Kamis pukul 20.00 WIB, dan Minggu pukul 13.00 WIB',
                'member' => 'Sekitar 50 orang',
                'location' => 'Badminton Hall Bale Santika, GOR Cileunyi Wetan, dan GOR Prestasi Bandung',
                'contact' => 'ubtuholic@gmail.com',
            ],
            [
                'id' => 4,
                'name' => 'Unit Renang Unpad',
                'short_name' => 'URU',
                'desc' => 'Unit Renang Unpad (URU) didirikan pada tanggal 1 Oktober 1988. Pada mulanya, URU merupakan sarana untuk berkumpul dan latihan untuk orang-orang yang ingin menyalurkan hobi renangnya. Dengan semakin berkembangnya UKM renang ini, anggota yang bergabung tidak hanya mereka yang jago berenang, tapi juga mereka yang tidak bisa berenang namun memiliki ketertarikan untuk belajar berenang. 
                
                Dengan mengikuti kegiatan Unit Renang Unpad ini, setiap anggota berkesempatan belajar dan mendapat pelatihan renang, terfokuskan mulai dari beberapa kategori (Tidak bisa, Bisa, dan Sangat Bisa).  Setiap anggota juga berkesempatan mengikuti lomba renang yang diadakan oleh pengurus, dan mewakili universitas untuk lomba di ajang tertentu. 
                
                Dilihat dari sisi kepengurusan, setiap pengurus URU mendapatkan kesempatan pengalaman berorganisasi dan mewakili Unpad di cabang olah raga renang. Selain itu, setiap pengurus juga dapat menjalin hubungan (relasi) dengan unit renang universitas lain dan mengadakan acara latih tanding/ latihan bersama. 
                
                Program latihan rutin dilaksanakan mingguan. Program latihan renang rutin ini terdiri dari pemanasan, program inti, sprint dan pendinginan. Lama waktu latihan renang adalah 2 jam. Latihan renang akan dibagi menjadi 2 tempat, yaitu kolam renang Karang Setra Bandung dan kolam renang SMK Yadika Tanjung Sari. Latihan dimulai pukul 16.00 WIB.',
                'category' => 'Olahraga',
                'avatar' => 'assets/ukm/logo/URU.jpeg',
                'date' => '2x/minggu pukul 16.00 WIB',
                'member' => 'Lebih dari 35 orang',
                'location' => 'kolam renang Karang Setra Bandung dan kolam renang SMK Yadika Tanjung Sari',
                'contact' => 'unitrenangunpad1988@gmail.com',
            ],
            [
                'id' => 5,
                'name' => 'Paduan Suara Mahasiswa Universitas Padjadjaran',
                'short_name' => 'PSM Unpad',
                'desc' => 'Paduan Suara Mahasiswa Universitas Padjadjaran (PSM Unpad) merupakan sebuah organisasi kemahasiswaan yang terbentuk pada tahun 1978. PSM Unpad beranggotakan 137 mahasiswa aktif dari berbagai disiplin ilmu. PSM Unpad berkembang sebagai salah satu unit kegiatan mahasiswa yang berperan penting dalam kegiatan-kegiatan protokoler dan seremonial di lingkungan Universitas Padjadjaran. Selain itu, PSM Unpad juga dikenal sebagai unit kegiatan mahasiswa terbesar di Universitas Padjadjaran dengan manajemen kemahasiswaan yang kuat. Dengan kata lain, unit kegiatan mahasiswa ini dapat menjadi sarana bagi para anggotanya untuk mengembangkan kemampuan bernyanyi maupun berorganisasi. 
                
                Dalam eksistensinya di dunia paduan suara, PSM Unpad telah berhasil menjuarai berbagai kompetisi, baik nasional maupun internasional. Tidak hanya itu, PSM Unpad juga turut dipercaya untuk tampil dalam beragam acara seremonial dan hiburan besar yang bekerjasama dengan berbagai instansi dan juga musisi, baik nasional maupun internasional, karena reputasi yang dimilikinya. Namun demikian, PSM Unpad pun hingga kini terus meningkatkan prestasinya sebagai salah satu paduan suara terbaik di Indonesia.',
                'category' => 'Kesenian',
                'avatar' => 'assets/ukm/logo/PSM-Unpad',
                'date' => '3x/minggu pukul 16.00 WIB',
                'member' => 'Lebih dari 100 orang',
                'location' => 'Bale Wilasa Timur',
                'contact' => 'unpadchoir@yahoo.com',
            ],
            [
                'id' => 6,
                'name' => 'Sadaluhung Padjadjaran Drum Corps',
                'short_name' => 'SPDC',
                'desc' => 'Sadaluhung Padjadjaran Drum Corps (SPDC) merupakan salah satu marching band tertua di Indonesia. Didirikan pada tanggal 21 Desember 1984, dan diresmikan oleh Menteri Pendidikan dan Kebudayaan Republik Indonesia saat itu, yaitu Prof. Dr. Nugroho Notosusanto. 
                
                SPDC singkatan dari Sadaluhung Padjadjaran Drum Corps. “Sadaluhung ” berasal dari bahasa etnik sunda, yang berarti “suara yang agung/ the great sound”, “Padjadjaran” karena SPDC berada di lingkungan Universitas Padjadjaran, dan “Drum Corps” adalah style SPDC dalam ber-marching band. 
                
                Sejak didirikan, SPDC tidak saja menjadi unit mahasiswa dengan jumlah anggota yang besar (sekitar 200 anggota setiap tahunnya), namun juga menjadi salah satu peta kekuatan marching band yang diperhitungkan di tingkat nasional. Berdasarkan ranking nasional marching band Indonesia versi website trendmarching.com , SPDC menempati peringkat 6 nasional dari 85 marching band (update April 2009), dan menempati peringkat 4 dari 138 band (update terakhir Januari 2011). 
                
                SPDC tidak pernah memberi persyaratan khusus dalam menyeleksi anggota baru, yang terpenting adalah mereka mau belajar dan mau mengikuti proses latihan dengan baik. SPDC adalah organisasi marching band sekaligus “keluarga” yang berfungsi sebagai wadah pendidikan dan pembinaan karakter bagi anggotanya. Setiap anggota akan mempelajari nilai-nilai, standar-standar, dimana setiap orang hendak belajar untuk memiliki rasa saling percaya dalam mencapai tujuan bersama.',
                'category' => 'Kesenian',
                'avatar' => 'assets/ukm/logo/SPDC.jpg',
                'date' => '1x/minggu pukul 16.00 WIB',
                'member' => 'Lebih dari 50 orang',
                'location' => 'Bale Wilasa Barat',
                'contact' => 'spdc.unpad@gmail.com',
            ], 
        ]);
    }
}
