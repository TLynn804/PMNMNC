<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // LIST
    public function index()
    {
        $categories = Category::where('is_delete',0)->get();
        return view('category.index', compact('categories'));
    }

    // FORM CREATE
    public function create()
    {
        $parents = Category::whereNull('parent_id')
                    ->where('is_delete',0)
                    ->get();

        return view('category.create', compact('parents'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'is_active' => $request->is_active ?? 1
        ]);

        return redirect('/category')->with('success','Thêm thành công');
    }

    // EDIT
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $parents = Category::whereNull('parent_id')
                    ->where('id','!=',$id) // không cho chọn chính nó
                    ->where('is_delete',0)
                    ->get();

        return view('category.edit', compact('category','parents'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'is_active' => $request->is_active ?? 1
        ]);

        return redirect('/category')->with('success','Cập nhật thành công');
    }

    // DELETE mềm
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->update(['is_delete'=>1]);

        return redirect('/category')->with('success','Đã xóa');
    }
}
