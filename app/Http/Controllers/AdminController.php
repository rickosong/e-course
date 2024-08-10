<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Materi;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $coursesCount = Course::count();
        $materiCount = Materi::count();
        $usersCount = User::where('role', 'user')->count();

        return view('dashadmin', compact('coursesCount', 'materiCount', 'usersCount'), [
            'courses' => Course::all(),
            'materis' => Materi::all(),
        ]);
    }
}
