<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    public function index(){

        $categories = Category::paginate(25);

        return view('back.categories.index', ['categories'=>$categories]);
    }

    public function delete(Category $category){

        if($category->delete()) {
            $msg = ['Category deleted succesfully', 'success'];
        } else {
            $msg = ['Error deleting category', 'danger'];
        }

        return redirect()->back()->with('message', $msg);
    }

    public function edit(Category $category) {
    
        return view('back.categories.edit', compact('category'));
    }

    public function create() {

        $category = new Category;

        return view('back.categories.edit', compact('category'));
    }

    public function store(CategoryRequest $request){
        
        $input = $request->all();

        if($product = Category::create($input)){
            $msg = ['Category created succesfully', 'success'];
        }else{
            $msg = ['Error creating category', 'danger'];
        }

        return redirect()->route('back.categories')->with('message', $msg);
    }

    public function update(CategoryRequest $request, Category $category) {
        
        $input = $request->all();

        if($category->update($input)) {
            $msg = ['Category updated succesfully', 'success'];
        } else {
            $msg = ['Error updating category', 'danger'];
        }

        return redirect()->back()->with('message', $msg);
    }
}
