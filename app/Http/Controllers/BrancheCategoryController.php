<?php

namespace App\Http\Controllers;

use App\Branches;
use App\Branches_categories;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class BrancheCategoryController extends Controller
{
    public function store(Branches $branche)
    {
        $id = request()->id;
        $branche->categories()->sync($id);
        return back();
    }
}