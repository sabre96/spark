<?php

namespace App\Http\Controllers;

use App\Category;
use App\Skill;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct () {
        $this->middleware('auth');
        $this->middleware('subscribed');
    }

    /**
     * Display the activity log screen.
     *
     * @return Response
     */
    public function index () {
        $skills = Skill::all();

        return view('Skills.index', compact('skills'));
    }

    public function show (Skill $skill) {
        return view('Skills.show', compact('skill'));
    }

    public function delete (Skill $skill) {
        DB::table('skills')->where('id', '=', $skill->id)->delete();

        return back();
    }

    public function edit (Skill $skill) {

        return view('Skills.edit', compact('skill'));
    }

    public function update (Skill $skill) {
        $this->validate(request(), [
            'name' => 'required|unique:skills,name,' . $skill->id . '|filled',
        ]);

        $skill->name = request()->name;

        $skill->update();

        return redirect('/categories/' . $skill->category_id);
    }

    public function store (Category $category) {
        $skill = new Skill();

        $this->validate(request(), [
            'name' => 'required|unique:skills,name,' . $skill->id . '|filled',
        ]);

        $skill->name = request()->name;
        $category->skills()->save($skill);

        return back();
    }
}