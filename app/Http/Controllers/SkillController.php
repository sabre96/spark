<?php

namespace App\Http\Controllers;

use App\Category;
use App\Skill;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('subscribed');
    }

    /**
     * Display the activity log screen.
     *
     * @return Response
     */
    public function index()
    {
        $skills = Skill::all();
        return view('Skills.index', compact('skills'));
    }

    public function show(Skill $skill)
    {
        return view('Skills.show', compact('skill'));
    }
    public function store(Category $category)
    {
        $skill = new Skill();
        $skill->name = request()->name;
        $category->skills()->save($skill);
        return back();
    }
}