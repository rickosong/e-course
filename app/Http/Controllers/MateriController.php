<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Course;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($courseId)
    {
        // Ambil semua materi yang berhubungan dengan materiId
        $materi = Materi::where('course_id', $courseId)->get();
        $courseName = Course::where('id', $courseId)->pluck('judul');
        $courseName = $courseName[0];
        $courseId = $courseId;

        // Kembalikan data sebagai JSON
        return view('materi', compact('courseId', 'courseName'), [
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
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img'), $imageName);

        $materi = New Materi;

        $materi->course_id = $request->course_id;
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->link = $request->link;
        $materi->image = $imageName;

        $materi->save();
        return redirect('/course/' . $materi->course_id . '/materi')->with('success', 'Materi Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materi = Materi::findOrFail($id);

        return view('edit-materi', [
            'materi' => $materi
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materi = Materi::findOrFail($id);

        $materi->course_id = $request->course_id;
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->link = $request->link;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);
            
            $materi->image = $imageName;
        } else {
            $materi->image = $materi->image;
        }

        $materi->update();
        return redirect('/course/' . $materi->course_id . '/materi')->with('success', 'Materi Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = materi::find($id);
        $materi->delete();

        return redirect('/course/' . $materi->course_id . '/materi')->with('success', 'Materi Updated');
    }

    
}
