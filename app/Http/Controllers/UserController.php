<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Materi;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiCount = Materi::count();
        return view ('home', compact('materiCount'), [
            'courses' => Course::all(),
        ]);
    }

    public function courseMateri($id)
    {
        $materi = Materi::where('course_id', $id)->get();
        $courseName = Course::where('id', $id)->pluck('judul');
        $courseName = $courseName[0];
        return view('course-materi', compact('courseName'), [
            'materis' => $materi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materi = Materi::findORFail($id);

        return view('show-materi', [
            'materi' => $materi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
