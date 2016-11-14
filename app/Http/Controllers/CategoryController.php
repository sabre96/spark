<?php

namespace App\Http\Controllers;

use App\Category;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct () {
        $this->middleware('auth');
        $this->middleware('subscribed');
    }

    public function index () {
        $categories = Category::all();

        return view('Categories.index', compact('categories'));
    }

    public function show (Category $category) {
        return view('Categories.show', compact('category'));
    }

    public function store () {
        $category = new Category;

        $this->validate(request(), [
            'name' => 'required|unique:categories,name,' . $category->id . '|filled',
        ]);

        $category->name = request()->name;
        DB::table('categories')->insert([
            'name'       => $category->name,
            'created_at' => DateTime::dateTime(),
            'updated_at' => DateTime::dateTime()
        ]);

        return back();
    }

    public function delete (Category $category) {
        DB::table('categories')->where('id', '=', $category->id)->delete();

        return back();
    }

    public function edit (Category $category) {
        return view('Categories.edit', compact('category'));
    }

    public function update (Category $category) {
        $this->validate(request(), [
            'name' => 'required|unique:categories,name,' . $category->id . '|filled',
        ]);

        $category->name = request()->name;

        $category->update();

        return redirect('/categories');
    }
}
