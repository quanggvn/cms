<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCate(){
        $data['catelist'] = Category::all();
        return view('backend.category', $data);
    }
    public function getEditCate(){
        return view('backend.editcategory');
    }
    public function getDeleteCate(){

    }
}
