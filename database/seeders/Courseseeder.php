<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Course::create([
            'judul' => 'Belajar Laravel 11',
            'deskripsi' => 'Ini adalah kursus beripa kumpulan materi video yang mana materinya adalah belajar laravel 11',
            'durasi' => 120,
            'image' => 'hqdefault.webp',
        ]);
        Course::create([
            'judul' => 'Belajar PHP Untuk Pemula',
            'deskripsi' => 'Ini adalah kursus beripa kumpulan materi video yang mana materinya adalah belajar Php Untuk Pemula',
            'durasi' => 80,
            'image' => 'hqdefault (1).webp',
        ]);
        Course::create([
            'judul' => 'Dasar Pemrograman dengan Javascript',
            'deskripsi' => 'Ini adalah kursus beripa kumpulan materi video yang mana materinya adalah Dasar pemrograman dengan javascript',
            'durasi' => 300,
            'image' => 'hqdefault (2).webp',
        ]);
    }
}
