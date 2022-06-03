<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title'=>'Soto Ayam Santan Susu',
            'category_id'=>1,
            'thumb'=>'/thumbnail/sotoayam.jpg',
            'user_id'=>1,
            'content'=>'<h1 style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><strong>Resep Soto Ayam Santan Susu</strong></span></h1>

            <p><strong>Bahan-bahan:</strong></p>
            
            <ul>
                <li>300 gr ayam rebus suwir</li>
                <li>5 siung bawang merah</li>
                <li>3 siung bawang putih</li>
                <li>1 cm jahe</li>
                <li>2 lembar&nbsp;daun salam</li>
                <li>2 ruas sereh</li>
                <li>1 ruas jahe</li>
                <li>700 ml Frisian Flag Purefarm Full Cream</li>
                <li>250 ml kaldu ayam/sapi</li>
                <li>&frac12; sdt merica</li>
                <li>3 butir cengkeh</li>
                <li>1 sdt ketumbar bubuk</li>
                <li>2 sdm gula pasir</li>
                <li>1 sdm minyak goreng</li>
                <li>Garam dan merica secukupnya</li>
                <li>Daun bawang dan bawang goreng (topping)</li>
            </ul>
            
            <p>&nbsp;</p>
            
            <p><strong>Cara membuat resep soto ayam santan susu:</strong></p>
            
            <ol>
                <li>Untuk membuat resep soto ayam santan kuah susu, pertama siapkan bawang merah 5 siung, bawang putih 3 siung, jahe 1 cm lalu haluskan</li>
                <li>Panaskan minyak, masukkan bumbu yang sudah dihaluskan, serai dan daun salam 2 lembar, ketumbar 1 sdt, cengkeh 3 butir, tambahkan kaldu ayam 250ml, Frisian Flag Purefarm Full Cream 700ml, garam sesuai selera, merica 1/2 sdt, gula 2 sdt.</li>
                <li>Di tempat terpisah, goreng ayam hingga matang. Setelah matang, suwir-suwir dagingnya</li>
                <li>Masukkan ayam suwir 300gr lalu aduk sampai bumbu-bumbunya meresap dan resep pengganti soto ayam santan ini siap dihidangkan dengan menambahkan daun bawang &amp; bawang goreng di atasnya.</li>
            </ol>
            
            <p><span style="font-family:Arial, Helvetica, sans-serif"><span style="font-size:22px"><strong>Selamat Mencoba :)</strong></span></span></p>
            '
        ]);
    }
}
