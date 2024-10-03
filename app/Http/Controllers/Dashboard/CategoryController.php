<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(2);
        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view("categories.create");
    }


    public function store(StoreRequest $request)
    {
        Category::create($request->validated());
        return to_route("categories.index")->with("created", "true");
    }


    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }


    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
        return to_route("categories.index")->with("updated", "true");
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return to_route("categories.index")->with("deleted", "true");
    }
}
