<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // return view('categories.index');

        // $categories = [
        //     [
        //         'id' => 1,
        //         'name' => 'Information Technology',
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Travel',
        //     ],
        //     [
        //         'id' => 3,
        //         'name' =>  'Food & Recipes'
        //     ],
        //     [
        //         'id' => 4,
        //         'name' => 'Health & Fitness'
        //     ]
        // ];

        // return view('categories.index', compact('categories'));

        $categories = Category::all();

        // dd($categories);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function edit()
    {
        return view('categories.edit');
    }
}
