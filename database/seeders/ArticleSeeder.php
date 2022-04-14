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
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse amet tristique montes, nisl molestie mattis amet nisi ultricies. Urna purus diam massa vitae. Ac vitae nunc, leo senectus eget eget facilisi euismod. Adipiscing porta lobortis ut felis aliquam consequat natoque. Netus at amet sed tortor nibh purus tortor. Varius vulputate justo purus mi consectetur sed. Suspendisse enim semper tortor volutpat nec. Semper eros dolor, morbi risus vitae. Sollicitudin ut nam lectus enim. Dictum porttitor morbi rhoncus adipiscing tristique sapien, scelerisque. Bibendum a at eu amet velit eros, nisl. Tempor et ut ultricies eu et erat nec elit in. Est metus congue adipiscing aliquam.
            Donec consequat sed dictum gravida ornare. Cras est ultrices egestas eget leo ultricies semper sit sed. Tristique orci, varius volutpat mi a cras ullamcorper vestibulum, non. Sed rhoncus, sit sagittis, turpis eleifend. Aenean sit nunc, volutpat nisi.
            Donec consequat sed dictum gravida ornare. Cras est ultrices egestas eget leo ultricies semper sit sed. Tristique orci, varius volutpat mi a cras ullamcorper vestibulum, non. Sed rhoncus, sit sagittis, turpis eleifend. Aenean sit nunc, volutpat nisi.
            Etiam sit nisi, pellentesque ultrices aliquet cras orci semper. Tincidunt in vitae fringilla urna pulvinar. Sed sed dolor neque ornare faucibus at tempor eget curabitur. Sit eleifend leo eu, in cursus lorem diam elementum amet. Habitant felis amet, cras non vitae. At magna et facilisis tellus turpis. Tellus sapien nisl consectetur ut. Suspendisse lacus maecenas ac at nisl, imperdiet sit. Ultrices eget dictum sed amet id pulvinar sed. Massa massa tellus neque magna. Congue eget elementum tellus pellentesque. Aliquet tellus fermentum non enim pellentesque est facilisis. Malesuada integer in ornare faucibus lorem. Lorem at lacus vestibulum proin mauris.
            Nibh amet ornare eros purus senectus vitae arcu. Non, eu ut dignissim at ac, quis varius vitae, donec. Ullamcorper enim, leo adipiscing morbi malesuada aliquet sit. Et massa enim, elit, dignissim nunc, quis urna, sit. Est sapien ultrices convallis tellus porta tempor.
            Augue est, varius diam, nec, proin varius. Nisi porta etiam arcu magna enim, aliquet augue faucibus. Duis eget ac integer tristique mauris vel ultricies. Tincidunt dignissim sem quis sem proin mi molestie. Nam mauris volutpat tortor praesent nam amet, nulla facilisis. Suscipit scelerisque hac dui tortor, elementum condimentum nisl quis. Tortor metus nunc viverra cum id. Pharetra varius venenatis gravida sapien sed pharetra lectus amet.
            Egestas fermentum viverra volutpat metus velit. Feugiat eu, mauris netus luctus lacus orci consequat. Malesuada habitasse pellentesque est enim. Tincidunt duis ornare bibendum aenean. Nullam aliquet pharetra, in eget hac. Vel suspendisse nulla tempor tortor tellus vitae fermentum. At interdum leo, erat et quam consectetur enim. Enim elementum in vitae egestas in est facilisis sed ut.
            Duis nulla nisl, quis egestas felis ipsum accumsan, nullam. Cum netus sed dolor faucibus sagittis facilisi tincidunt. Eget purus morbi egestas non tristique imperdiet vel. Ultrices morbi nunc tincidunt mauris dapibus. Pulvinar quam gravida sed sed id integer ornare. Turpis turpis at sed venenatis. Tellus sed facilisi lobortis tellus varius scelerisque eget. Urna elit feugiat lectus volutpat, hendrerit adipiscing neque. Leo quisque velit pellentesque elit. Tristique nibh id et turpis massa tempor viverra sit. Odio scelerisque integer libero, urna.',
                'image' => 'assets/article/1.png',
            ],
            [
                'ukm_id' => 5,
                'subject' => 'Pertemuan Perdana Rangkaian Penerimaan Anggota Baru 2021',
                'slug' => 'pertemuan-perdana-rangkaian-penerimaan-anggota-baru-2021',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse amet tristique montes, nisl molestie mattis amet nisi ultricies. Urna purus diam massa vitae. Ac vitae nunc, leo senectus eget eget facilisi euismod. Adipiscing porta lobortis ut felis aliquam consequat natoque. Netus at amet sed tortor nibh purus tortor. Varius vulputate justo purus mi consectetur sed. Suspendisse enim semper tortor volutpat nec. Semper eros dolor, morbi risus vitae. Sollicitudin ut nam lectus enim. Dictum porttitor morbi rhoncus adipiscing tristique sapien, scelerisque. Bibendum a at eu amet velit eros, nisl. Tempor et ut ultricies eu et erat nec elit in. Est metus congue adipiscing aliquam.
            Donec consequat sed dictum gravida ornare. Cras est ultrices egestas eget leo ultricies semper sit sed. Tristique orci, varius volutpat mi a cras ullamcorper vestibulum, non. Sed rhoncus, sit sagittis, turpis eleifend. Aenean sit nunc, volutpat nisi.
            Donec consequat sed dictum gravida ornare. Cras est ultrices egestas eget leo ultricies semper sit sed. Tristique orci, varius volutpat mi a cras ullamcorper vestibulum, non. Sed rhoncus, sit sagittis, turpis eleifend. Aenean sit nunc, volutpat nisi.
            Etiam sit nisi, pellentesque ultrices aliquet cras orci semper. Tincidunt in vitae fringilla urna pulvinar. Sed sed dolor neque ornare faucibus at tempor eget curabitur. Sit eleifend leo eu, in cursus lorem diam elementum amet. Habitant felis amet, cras non vitae. At magna et facilisis tellus turpis. Tellus sapien nisl consectetur ut. Suspendisse lacus maecenas ac at nisl, imperdiet sit. Ultrices eget dictum sed amet id pulvinar sed. Massa massa tellus neque magna. Congue eget elementum tellus pellentesque. Aliquet tellus fermentum non enim pellentesque est facilisis. Malesuada integer in ornare faucibus lorem. Lorem at lacus vestibulum proin mauris.
            Nibh amet ornare eros purus senectus vitae arcu. Non, eu ut dignissim at ac, quis varius vitae, donec. Ullamcorper enim, leo adipiscing morbi malesuada aliquet sit. Et massa enim, elit, dignissim nunc, quis urna, sit. Est sapien ultrices convallis tellus porta tempor.
            Augue est, varius diam, nec, proin varius. Nisi porta etiam arcu magna enim, aliquet augue faucibus. Duis eget ac integer tristique mauris vel ultricies. Tincidunt dignissim sem quis sem proin mi molestie. Nam mauris volutpat tortor praesent nam amet, nulla facilisis. Suscipit scelerisque hac dui tortor, elementum condimentum nisl quis. Tortor metus nunc viverra cum id. Pharetra varius venenatis gravida sapien sed pharetra lectus amet.
            Egestas fermentum viverra volutpat metus velit. Feugiat eu, mauris netus luctus lacus orci consequat. Malesuada habitasse pellentesque est enim. Tincidunt duis ornare bibendum aenean. Nullam aliquet pharetra, in eget hac. Vel suspendisse nulla tempor tortor tellus vitae fermentum. At interdum leo, erat et quam consectetur enim. Enim elementum in vitae egestas in est facilisis sed ut.
            Duis nulla nisl, quis egestas felis ipsum accumsan, nullam. Cum netus sed dolor faucibus sagittis facilisi tincidunt. Eget purus morbi egestas non tristique imperdiet vel. Ultrices morbi nunc tincidunt mauris dapibus. Pulvinar quam gravida sed sed id integer ornare. Turpis turpis at sed venenatis. Tellus sed facilisi lobortis tellus varius scelerisque eget. Urna elit feugiat lectus volutpat, hendrerit adipiscing neque. Leo quisque velit pellentesque elit. Tristique nibh id et turpis massa tempor viverra sit. Odio scelerisque integer libero, urna.',
            'image' => 'assets/article/2.jpg',
            ],
            [
                'ukm_id' => 3,
                'subject' => 'Juara 1 Perseorangan Tunggal Putra',
                'slug' => 'juara-1-perseorangan-tunggal-putra',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse amet tristique montes, nisl molestie mattis amet nisi ultricies. Urna purus diam massa vitae. Ac vitae nunc, leo senectus eget eget facilisi euismod. Adipiscing porta lobortis ut felis aliquam consequat natoque. Netus at amet sed tortor nibh purus tortor. Varius vulputate justo purus mi consectetur sed. Suspendisse enim semper tortor volutpat nec. Semper eros dolor, morbi risus vitae. Sollicitudin ut nam lectus enim. Dictum porttitor morbi rhoncus adipiscing tristique sapien, scelerisque. Bibendum a at eu amet velit eros, nisl. Tempor et ut ultricies eu et erat nec elit in. Est metus congue adipiscing aliquam.
            Donec consequat sed dictum gravida ornare. Cras est ultrices egestas eget leo ultricies semper sit sed. Tristique orci, varius volutpat mi a cras ullamcorper vestibulum, non. Sed rhoncus, sit sagittis, turpis eleifend. Aenean sit nunc, volutpat nisi.
            Donec consequat sed dictum gravida ornare. Cras est ultrices egestas eget leo ultricies semper sit sed. Tristique orci, varius volutpat mi a cras ullamcorper vestibulum, non. Sed rhoncus, sit sagittis, turpis eleifend. Aenean sit nunc, volutpat nisi.
            Etiam sit nisi, pellentesque ultrices aliquet cras orci semper. Tincidunt in vitae fringilla urna pulvinar. Sed sed dolor neque ornare faucibus at tempor eget curabitur. Sit eleifend leo eu, in cursus lorem diam elementum amet. Habitant felis amet, cras non vitae. At magna et facilisis tellus turpis. Tellus sapien nisl consectetur ut. Suspendisse lacus maecenas ac at nisl, imperdiet sit. Ultrices eget dictum sed amet id pulvinar sed. Massa massa tellus neque magna. Congue eget elementum tellus pellentesque. Aliquet tellus fermentum non enim pellentesque est facilisis. Malesuada integer in ornare faucibus lorem. Lorem at lacus vestibulum proin mauris.
            Nibh amet ornare eros purus senectus vitae arcu. Non, eu ut dignissim at ac, quis varius vitae, donec. Ullamcorper enim, leo adipiscing morbi malesuada aliquet sit. Et massa enim, elit, dignissim nunc, quis urna, sit. Est sapien ultrices convallis tellus porta tempor.
            Augue est, varius diam, nec, proin varius. Nisi porta etiam arcu magna enim, aliquet augue faucibus. Duis eget ac integer tristique mauris vel ultricies. Tincidunt dignissim sem quis sem proin mi molestie. Nam mauris volutpat tortor praesent nam amet, nulla facilisis. Suscipit scelerisque hac dui tortor, elementum condimentum nisl quis. Tortor metus nunc viverra cum id. Pharetra varius venenatis gravida sapien sed pharetra lectus amet.
            Egestas fermentum viverra volutpat metus velit. Feugiat eu, mauris netus luctus lacus orci consequat. Malesuada habitasse pellentesque est enim. Tincidunt duis ornare bibendum aenean. Nullam aliquet pharetra, in eget hac. Vel suspendisse nulla tempor tortor tellus vitae fermentum. At interdum leo, erat et quam consectetur enim. Enim elementum in vitae egestas in est facilisis sed ut.
            Duis nulla nisl, quis egestas felis ipsum accumsan, nullam. Cum netus sed dolor faucibus sagittis facilisi tincidunt. Eget purus morbi egestas non tristique imperdiet vel. Ultrices morbi nunc tincidunt mauris dapibus. Pulvinar quam gravida sed sed id integer ornare. Turpis turpis at sed venenatis. Tellus sed facilisi lobortis tellus varius scelerisque eget. Urna elit feugiat lectus volutpat, hendrerit adipiscing neque. Leo quisque velit pellentesque elit. Tristique nibh id et turpis massa tempor viverra sit. Odio scelerisque integer libero, urna.',
            'image' => 'assets/article/3.jpg',
            ]
        ]
        );
    }
}
