<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
class CategoryController extends Controller
{
    public function getCate(){
        $data['catelist'] = Category::all();
        return view('backend.category1', $data);
    }
    public function postCate(AddCateRequest $request){
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->cate_name);
        $category->save();
        return back();
    }
    public function getEditCate(){
        return view('backend.editcategory');
    }
    public function getDeleteCate(){

    }
}
