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

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('categories.edit', compact('category'));
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        // dd($data);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function update(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        // dd($category);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        // dd($id);
        $category = Category::where('id', $id)->first();
        // dd($category);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
