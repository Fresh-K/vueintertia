<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::with('user')->withCount('episodes')->get();
        return Inertia::render('courses/index', compact('courses'));
    }

    public function show($id){
        $course = Course::where('id',$id)->with('episodes')->first();

        return Inertia::render('courses/show', compact('course'));


    }
}
