<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function getCategorires(){
        $categories = Category::all();
        return view('admin.categories.view-category',['categories'=>$categories]);
    }
    public function getAddCategory(){
        return view('admin.categories.add-category');
    }
    public function addCategory(Request $request){
        $category=new Category;
        $category->name=$request->category_name;
        $category->description=$request->description;
        $category->url=$request->url;
        $category->save();
        return redirect()->route('get.categories')->with('flush_errors','Category added successfully');
    }
    public function editCategory(Category $category){
        return view('admin.categories.edit-category',['category'=>$category]);
    }
    public function updateCategory(Request $request,$id){
        $category=Category::find($id);
        $category->name=$request->category_name;
        $category->description=$request->description;
        $category->url=$request->url;
        $category->save();
        return redirect()->route('get.categories')->with('flush_errors','Category updated successfully');
    }
    public function deleteCategory($id){
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('get.categories')->with('flush_errors','Category deleted successfully');
    }
}
