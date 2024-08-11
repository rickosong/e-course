<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materi;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materi::create([
            'course_id' => 1,
            'judul' => 'Intro',
            'deskripsi' => 'Intro untuk belajar laravel 11',
            'link' => 'https://www.youtube.com/embed/T1TR-RGf2Pw?si=kQs-IVH-XvPpDS-P',
            'image' => 'hqdefault (3).webp',
        ]);
        Materi::create([
            'course_id' => 1,
            'judul' => 'Instalasi & konfigurasi',
            'deskripsi' => 'Instalasi dan konfigurasi untuk belajar Laravel 11',
            'link' => 'https://www.youtube.com/embed/nW60yGRoUrs?si=XYqFmp3IUYDmKJuD',
            'image' => 'hqdefault (4).webp',
        ]);
        Materi::create([
            'course_id' => 1,
            'judul' => 'Blade PHP',
            'deskripsi' => 'memahami cara kerja blade php di laravel 11',
            'link' => 'https://www.youtube.com/embed/x55ndgkD2QI?si=UP1ovc_rEwW9ZyLO',
            'image' => 'hqdefault (5).webp',
        ]);


        Materi::create([
            'course_id' => 2,
            'judul' => 'Intro',
            'deskripsi' => 'Intro untuk belajar PHP',
            'link' => 'https://www.youtube.com/embed/l1W2OwV5rgY?si=DStLSu5RZw_959Kh',
            'image' => 'hqdefault (1).webp',
        ]);


        Materi::create([
            'course_id' => 3,
            'judul' => 'Intro',
            'deskripsi' => 'Intro untuk belajar Javascript Dasar',
            'link' => 'https://www.youtube.com/embed/RUTV_5m4VeI?si=_q0Q96KzAAE8G8qR',
            'image' => 'hqdefault (2).webp',
        ]);
    }
}
