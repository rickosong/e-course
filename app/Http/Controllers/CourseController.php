<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $course = New Course;

        $course->judul = $request->judul;
        $course->deskripsi = $request->deskripsi;
        $course->durasi = $request->durasi;
        $course->image = $imageName;

        $course->save();
        return redirect('/dashadmin')->with('success', 'Course Added');
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
        $course = Course::findOrFail($id);

        return view('edit-course', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);

        $course->judul = $request->judul;
        $course->deskripsi = $request->deskripsi;
        $course->durasi = $request->durasi;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);
            
            $course->image = $imageName;
        } else {
            $course->image = $course->image;
        }

        $course->update();
        return redirect('/dashadmin')->with('success', ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::find($id)->delete();

        return redirect('/dashadmin')->with('success', 'Course Deleted');
    }
}
