<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'ukm_id' => 5,
                'subject' => 'Kaleidoskop PSM Unpad 2021: PSM Unpad Di Era New Normal',
                'slug' => 'kaleidoskop-psm-unpad-2021:-psm-unpad-di-era-new-normal',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut neque ullamcorper, tincidunt dolor vel, pellentesque tortor. Etiam varius hendrerit scelerisque. Duis vitae justo eu velit blandit porta nec at felis. Ut vestibulum odio non semper facilisis. Quisque dignissim in enim non accumsan. Aenean viverra condimentum venenatis. Duis placerat, erat a fringilla ullamcorper, ante nibh commodo ipsum, vel iaculis magna diam et magna. Vivamus ultricies pellentesque hendrerit. Suspendisse nec est ut quam vehicula sagittis a ac velit. Quisque massa dolor, mollis vel arcu nec, lacinia venenatis tortor. Vivamus dictum libero eu eleifend ullamcorper. Etiam eget sollicitudin mauris, a egestas nulla. Phasellus blandit rhoncus finibus. Nullam ut dolor odio. Quisque odio augue, cursus ut placerat id, pellentesque ac urna.

                Suspendisse tristique nulla ut turpis mollis luctus. Aliquam non odio ut risus elementum mattis. Phasellus venenatis commodo bibendum. Integer viverra quam ac congue tempus. Donec et augue vel nisi gravida malesuada sed blandit ligula. Curabitur sem elit, dictum eu erat non, malesuada feugiat elit. Aenean viverra ex non neque tincidunt, a sagittis leo pulvinar. Morbi convallis lacus ac feugiat mollis. Integer mattis purus nec sem euismod tempor. Praesent euismod vulputate elit vel vulputate. Sed sodales pellentesque libero, semper lacinia urna scelerisque ac. Aenean in arcu malesuada mi consequat tempus.
                
                In convallis nulla et augue pellentesque, et dignissim nunc finibus. Quisque vestibulum ex eros, ut elementum risus facilisis eu. Vestibulum pretium tincidunt dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris viverra mauris lorem, sit amet sodales massa faucibus non. Duis est ipsum, sollicitudin mattis convallis in, posuere in augue. Nam maximus suscipit tristique. Vestibulum sed nisl condimentum, molestie magna vel, tincidunt nisi. Nullam egestas iaculis ex ac lacinia.',
                'image' => 'assets/article/1.png',
            ],
            [
                'ukm_id' => 5,
                'subject' => 'Pertemuan Perdana Rangkaian Penerimaan Anggota Baru 2021',
                'slug' => 'pertemuan-perdana-rangkaian-penerimaan-anggota-baru-2021',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut neque ullamcorper, tincidunt dolor vel, pellentesque tortor. Etiam varius hendrerit scelerisque. Duis vitae justo eu velit blandit porta nec at felis. Ut vestibulum odio non semper facilisis. Quisque dignissim in enim non accumsan. Aenean viverra condimentum venenatis. Duis placerat, erat a fringilla ullamcorper, ante nibh commodo ipsum, vel iaculis magna diam et magna. Vivamus ultricies pellentesque hendrerit. Suspendisse nec est ut quam vehicula sagittis a ac velit. Quisque massa dolor, mollis vel arcu nec, lacinia venenatis tortor. Vivamus dictum libero eu eleifend ullamcorper. Etiam eget sollicitudin mauris, a egestas nulla. Phasellus blandit rhoncus finibus. Nullam ut dolor odio. Quisque odio augue, cursus ut placerat id, pellentesque ac urna.

                Suspendisse tristique nulla ut turpis mollis luctus. Aliquam non odio ut risus elementum mattis. Phasellus venenatis commodo bibendum. Integer viverra quam ac congue tempus. Donec et augue vel nisi gravida malesuada sed blandit ligula. Curabitur sem elit, dictum eu erat non, malesuada feugiat elit. Aenean viverra ex non neque tincidunt, a sagittis leo pulvinar. Morbi convallis lacus ac feugiat mollis. Integer mattis purus nec sem euismod tempor. Praesent euismod vulputate elit vel vulputate. Sed sodales pellentesque libero, semper lacinia urna scelerisque ac. Aenean in arcu malesuada mi consequat tempus.
                
                In convallis nulla et augue pellentesque, et dignissim nunc finibus. Quisque vestibulum ex eros, ut elementum risus facilisis eu. Vestibulum pretium tincidunt dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris viverra mauris lorem, sit amet sodales massa faucibus non. Duis est ipsum, sollicitudin mattis convallis in, posuere in augue. Nam maximus suscipit tristique. Vestibulum sed nisl condimentum, molestie magna vel, tincidunt nisi. Nullam egestas iaculis ex ac lacinia.',
            'image' => 'assets/article/2.jpg',
            ],
            [
                'ukm_id' => 3,
                'subject' => 'Juara 1 Perseorangan Tunggal Putra',
                'slug' => 'juara-1-perseorangan-tunggal-putra',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut neque ullamcorper, tincidunt dolor vel, pellentesque tortor. Etiam varius hendrerit scelerisque. Duis vitae justo eu velit blandit porta nec at felis. Ut vestibulum odio non semper facilisis. Quisque dignissim in enim non accumsan. Aenean viverra condimentum venenatis. Duis placerat, erat a fringilla ullamcorper, ante nibh commodo ipsum, vel iaculis magna diam et magna. Vivamus ultricies pellentesque hendrerit. Suspendisse nec est ut quam vehicula sagittis a ac velit. Quisque massa dolor, mollis vel arcu nec, lacinia venenatis tortor. Vivamus dictum libero eu eleifend ullamcorper. Etiam eget sollicitudin mauris, a egestas nulla. Phasellus blandit rhoncus finibus. Nullam ut dolor odio. Quisque odio augue, cursus ut placerat id, pellentesque ac urna.

                Suspendisse tristique nulla ut turpis mollis luctus. Aliquam non odio ut risus elementum mattis. Phasellus venenatis commodo bibendum. Integer viverra quam ac congue tempus. Donec et augue vel nisi gravida malesuada sed blandit ligula. Curabitur sem elit, dictum eu erat non, malesuada feugiat elit. Aenean viverra ex non neque tincidunt, a sagittis leo pulvinar. Morbi convallis lacus ac feugiat mollis. Integer mattis purus nec sem euismod tempor. Praesent euismod vulputate elit vel vulputate. Sed sodales pellentesque libero, semper lacinia urna scelerisque ac. Aenean in arcu malesuada mi consequat tempus.
                
                In convallis nulla et augue pellentesque, et dignissim nunc finibus. Quisque vestibulum ex eros, ut elementum risus facilisis eu. Vestibulum pretium tincidunt dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris viverra mauris lorem, sit amet sodales massa faucibus non. Duis est ipsum, sollicitudin mattis convallis in, posuere in augue. Nam maximus suscipit tristique. Vestibulum sed nisl condimentum, molestie magna vel, tincidunt nisi. Nullam egestas iaculis ex ac lacinia.',
            'image' => 'assets/article/3.jpg',
            ],
            [
                'ukm_id' => 5,
                'subject' => 'Konser Intern 2021 "Orpheus: Suara Indah Yang Memikat"',
                'slug' => 'konser-intern-2021-"orpheus:-suara-indah-yang-memikat"',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut neque ullamcorper, tincidunt dolor vel, pellentesque tortor. Etiam varius hendrerit scelerisque. Duis vitae justo eu velit blandit porta nec at felis. Ut vestibulum odio non semper facilisis. Quisque dignissim in enim non accumsan. Aenean viverra condimentum venenatis. Duis placerat, erat a fringilla ullamcorper, ante nibh commodo ipsum, vel iaculis magna diam et magna. Vivamus ultricies pellentesque hendrerit. Suspendisse nec est ut quam vehicula sagittis a ac velit. Quisque massa dolor, mollis vel arcu nec, lacinia venenatis tortor. Vivamus dictum libero eu eleifend ullamcorper. Etiam eget sollicitudin mauris, a egestas nulla. Phasellus blandit rhoncus finibus. Nullam ut dolor odio. Quisque odio augue, cursus ut placerat id, pellentesque ac urna.

                Suspendisse tristique nulla ut turpis mollis luctus. Aliquam non odio ut risus elementum mattis. Phasellus venenatis commodo bibendum. Integer viverra quam ac congue tempus. Donec et augue vel nisi gravida malesuada sed blandit ligula. Curabitur sem elit, dictum eu erat non, malesuada feugiat elit. Aenean viverra ex non neque tincidunt, a sagittis leo pulvinar. Morbi convallis lacus ac feugiat mollis. Integer mattis purus nec sem euismod tempor. Praesent euismod vulputate elit vel vulputate. Sed sodales pellentesque libero, semper lacinia urna scelerisque ac. Aenean in arcu malesuada mi consequat tempus.
                
                In convallis nulla et augue pellentesque, et dignissim nunc finibus. Quisque vestibulum ex eros, ut elementum risus facilisis eu. Vestibulum pretium tincidunt dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris viverra mauris lorem, sit amet sodales massa faucibus non. Duis est ipsum, sollicitudin mattis convallis in, posuere in augue. Nam maximus suscipit tristique. Vestibulum sed nisl condimentum, molestie magna vel, tincidunt nisi. Nullam egestas iaculis ex ac lacinia.',
            'image' => 'assets/article/4.jpg',
            ],
            [
                'ukm_id' => 1,
                'subject' => 'Juara 1 Kumite 75kg Brawijaya Karate Championship University',
                'slug' => 'juara-1-kumite-75kg-brawijaya-karate-championship-university',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut neque ullamcorper, tincidunt dolor vel, pellentesque tortor. Etiam varius hendrerit scelerisque. Duis vitae justo eu velit blandit porta nec at felis. Ut vestibulum odio non semper facilisis. Quisque dignissim in enim non accumsan. Aenean viverra condimentum venenatis. Duis placerat, erat a fringilla ullamcorper, ante nibh commodo ipsum, vel iaculis magna diam et magna. Vivamus ultricies pellentesque hendrerit. Suspendisse nec est ut quam vehicula sagittis a ac velit. Quisque massa dolor, mollis vel arcu nec, lacinia venenatis tortor. Vivamus dictum libero eu eleifend ullamcorper. Etiam eget sollicitudin mauris, a egestas nulla. Phasellus blandit rhoncus finibus. Nullam ut dolor odio. Quisque odio augue, cursus ut placerat id, pellentesque ac urna.

                Suspendisse tristique nulla ut turpis mollis luctus. Aliquam non odio ut risus elementum mattis. Phasellus venenatis commodo bibendum. Integer viverra quam ac congue tempus. Donec et augue vel nisi gravida malesuada sed blandit ligula. Curabitur sem elit, dictum eu erat non, malesuada feugiat elit. Aenean viverra ex non neque tincidunt, a sagittis leo pulvinar. Morbi convallis lacus ac feugiat mollis. Integer mattis purus nec sem euismod tempor. Praesent euismod vulputate elit vel vulputate. Sed sodales pellentesque libero, semper lacinia urna scelerisque ac. Aenean in arcu malesuada mi consequat tempus.
                
                In convallis nulla et augue pellentesque, et dignissim nunc finibus. Quisque vestibulum ex eros, ut elementum risus facilisis eu. Vestibulum pretium tincidunt dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris viverra mauris lorem, sit amet sodales massa faucibus non. Duis est ipsum, sollicitudin mattis convallis in, posuere in augue. Nam maximus suscipit tristique. Vestibulum sed nisl condimentum, molestie magna vel, tincidunt nisi. Nullam egestas iaculis ex ac lacinia.',
            'image' => 'assets/article/5.jpg',
            ],
            [
                'ukm_id' => 2,
                'subject' => 'Kejuaraan Nasional Universitas Brawijaya',
                'slug' => 'kejuaraan-nasional-universitas-brawijaya',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut neque ullamcorper, tincidunt dolor vel, pellentesque tortor. Etiam varius hendrerit scelerisque. Duis vitae justo eu velit blandit porta nec at felis. Ut vestibulum odio non semper facilisis. Quisque dignissim in enim non accumsan. Aenean viverra condimentum venenatis. Duis placerat, erat a fringilla ullamcorper, ante nibh commodo ipsum, vel iaculis magna diam et magna. Vivamus ultricies pellentesque hendrerit. Suspendisse nec est ut quam vehicula sagittis a ac velit. Quisque massa dolor, mollis vel arcu nec, lacinia venenatis tortor. Vivamus dictum libero eu eleifend ullamcorper. Etiam eget sollicitudin mauris, a egestas nulla. Phasellus blandit rhoncus finibus. Nullam ut dolor odio. Quisque odio augue, cursus ut placerat id, pellentesque ac urna.

                Suspendisse tristique nulla ut turpis mollis luctus. Aliquam non odio ut risus elementum mattis. Phasellus venenatis commodo bibendum. Integer viverra quam ac congue tempus. Donec et augue vel nisi gravida malesuada sed blandit ligula. Curabitur sem elit, dictum eu erat non, malesuada feugiat elit. Aenean viverra ex non neque tincidunt, a sagittis leo pulvinar. Morbi convallis lacus ac feugiat mollis. Integer mattis purus nec sem euismod tempor. Praesent euismod vulputate elit vel vulputate. Sed sodales pellentesque libero, semper lacinia urna scelerisque ac. Aenean in arcu malesuada mi consequat tempus.
                
                In convallis nulla et augue pellentesque, et dignissim nunc finibus. Quisque vestibulum ex eros, ut elementum risus facilisis eu. Vestibulum pretium tincidunt dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris viverra mauris lorem, sit amet sodales massa faucibus non. Duis est ipsum, sollicitudin mattis convallis in, posuere in augue. Nam maximus suscipit tristique. Vestibulum sed nisl condimentum, molestie magna vel, tincidunt nisi. Nullam egestas iaculis ex ac lacinia.',
            'image' => 'assets/article/6.png',
            ],
            [
                'ukm_id' => 3,
                'subject' => 'UBTU Home Tournament',
                'slug' => 'ubtu-home-tournament',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut neque ullamcorper, tincidunt dolor vel, pellentesque tortor. Etiam varius hendrerit scelerisque. Duis vitae justo eu velit blandit porta nec at felis. Ut vestibulum odio non semper facilisis. Quisque dignissim in enim non accumsan. Aenean viverra condimentum venenatis. Duis placerat, erat a fringilla ullamcorper, ante nibh commodo ipsum, vel iaculis magna diam et magna. Vivamus ultricies pellentesque hendrerit. Suspendisse nec est ut quam vehicula sagittis a ac velit. Quisque massa dolor, mollis vel arcu nec, lacinia venenatis tortor. Vivamus dictum libero eu eleifend ullamcorper. Etiam eget sollicitudin mauris, a egestas nulla. Phasellus blandit rhoncus finibus. Nullam ut dolor odio. Quisque odio augue, cursus ut placerat id, pellentesque ac urna.

                Suspendisse tristique nulla ut turpis mollis luctus. Aliquam non odio ut risus elementum mattis. Phasellus venenatis commodo bibendum. Integer viverra quam ac congue tempus. Donec et augue vel nisi gravida malesuada sed blandit ligula. Curabitur sem elit, dictum eu erat non, malesuada feugiat elit. Aenean viverra ex non neque tincidunt, a sagittis leo pulvinar. Morbi convallis lacus ac feugiat mollis. Integer mattis purus nec sem euismod tempor. Praesent euismod vulputate elit vel vulputate. Sed sodales pellentesque libero, semper lacinia urna scelerisque ac. Aenean in arcu malesuada mi consequat tempus.
                
                In convallis nulla et augue pellentesque, et dignissim nunc finibus. Quisque vestibulum ex eros, ut elementum risus facilisis eu. Vestibulum pretium tincidunt dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris viverra mauris lorem, sit amet sodales massa faucibus non. Duis est ipsum, sollicitudin mattis convallis in, posuere in augue. Nam maximus suscipit tristique. Vestibulum sed nisl condimentum, molestie magna vel, tincidunt nisi. Nullam egestas iaculis ex ac lacinia.',
            'image' => 'assets/article/7.jfif',
            ],
            [
                'ukm_id' => 4,
                'subject' => 'First Meet Calon Anggota Uru 2021',
                'slug' => 'first-meet-calon-anggota-uru-2021',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut neque ullamcorper, tincidunt dolor vel, pellentesque tortor. Etiam varius hendrerit scelerisque. Duis vitae justo eu velit blandit porta nec at felis. Ut vestibulum odio non semper facilisis. Quisque dignissim in enim non accumsan. Aenean viverra condimentum venenatis. Duis placerat, erat a fringilla ullamcorper, ante nibh commodo ipsum, vel iaculis magna diam et magna. Vivamus ultricies pellentesque hendrerit. Suspendisse nec est ut quam vehicula sagittis a ac velit. Quisque massa dolor, mollis vel arcu nec, lacinia venenatis tortor. Vivamus dictum libero eu eleifend ullamcorper. Etiam eget sollicitudin mauris, a egestas nulla. Phasellus blandit rhoncus finibus. Nullam ut dolor odio. Quisque odio augue, cursus ut placerat id, pellentesque ac urna.

                Suspendisse tristique nulla ut turpis mollis luctus. Aliquam non odio ut risus elementum mattis. Phasellus venenatis commodo bibendum. Integer viverra quam ac congue tempus. Donec et augue vel nisi gravida malesuada sed blandit ligula. Curabitur sem elit, dictum eu erat non, malesuada feugiat elit. Aenean viverra ex non neque tincidunt, a sagittis leo pulvinar. Morbi convallis lacus ac feugiat mollis. Integer mattis purus nec sem euismod tempor. Praesent euismod vulputate elit vel vulputate. Sed sodales pellentesque libero, semper lacinia urna scelerisque ac. Aenean in arcu malesuada mi consequat tempus.
                
                In convallis nulla et augue pellentesque, et dignissim nunc finibus. Quisque vestibulum ex eros, ut elementum risus facilisis eu. Vestibulum pretium tincidunt dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris viverra mauris lorem, sit amet sodales massa faucibus non. Duis est ipsum, sollicitudin mattis convallis in, posuere in augue. Nam maximus suscipit tristique. Vestibulum sed nisl condimentum, molestie magna vel, tincidunt nisi. Nullam egestas iaculis ex ac lacinia.',
            'image' => 'assets/article/8.jpg',
            ],
        ]
        );
    }
}
