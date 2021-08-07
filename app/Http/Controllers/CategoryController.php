<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // RETURN ADD CATEGORY VIEW
    public function categories(Request $request){
        return view('components.pharmacy.categories', ['categories'=>Category::all()]);
    }

    // ADD
    public function addCategory(Request $request){
        // VALIDAION
        $request->validate([
            'category'=>['required'],
            'description'=>['required']
        ]);

        // CREATING CATEGORY
        $category_created = Category::create([
            'category'=>$request->category,
            'description'=>$request->description
        ]);

        if($category_created == true){
            return redirect()->route('categories')->with('category_created', "Category ".$request->category.' created successfully');
        }
    }

    public function deleteCategory(Request $request){
        if(Category::find($request->category_id)->delete()){
            return redirect()->route('categories')->with('category_deleted', 'Category successfully deleted');
        }
    }
}
