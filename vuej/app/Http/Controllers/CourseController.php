<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::with('user')
            ->select('courses.*', DB::raw(
                '(SELECT COUNT(DISTINCT(user_id))
            FROM completions
            INNER JOIN episodes ON completions.episode_id = episodes.id
            WHERE episodes.course_id = courses.id
            ) AS participants'))
            ->withCount('episodes')->latest()->get();
        return Inertia::render('courses/index', compact('courses'));
    }





    public function show($id){
        $course = Course::where('id',$id)->with('episodes')->first();
        $watched = auth()->user()->episodes;
        return Inertia::render('courses/show', compact('course','watched'));
    }

    public function store (Request $request){

        $course = Course::create($request->all());

        foreach($request->input('episodes') as $episode)
        {
            $episode['course_id'] = $course->id;
            Episode::create($episode);
        }

        return Redirect::route('dashboard')->with('success', 'Félicitations, votre formation a bien été postée.');
    }



    public function edit($id){
        $course = Course::where('id',$id)->with('episodes')->first();
        $this->authorize('update', $course);

        return Inertia::render('courses/Edit', compact('course'));
    }

    public function update(Request $request){
        $course = Course::where('id', $request->id)->first();
        $this->authorize('update', $course);
        $course->update($request->all());
        $course->episodes()->delete();

        foreach($request->episodes as $episode) {
            $episode['course_id'] = $course->id;
            Episode::create($episode);
        }

        return Redirect::route('courses.index')->with('success', 'Félicitations, votre formation a bien été modifiée.');
    }



    public function toggleProgress(Request $request){


        $id = $request->input('episodeId');
        $user = auth()->user();

        $user->episodes()->toggle($id);

        return $user->episodes;
    }
}
