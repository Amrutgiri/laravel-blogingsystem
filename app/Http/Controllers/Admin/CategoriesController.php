<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\File; 
use App\Http\Requests\Admin\CategoriesFromRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.categories.index', compact('category'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(CategoriesFromRequest $request)
    {
            $data=$request->validated();

            $category=new category;

            $category->name=$data['name'];
            $category->slug=Str::slug($data['slug']);
            $category->description=$data['description'];
            if($request->hasfile('image'))
            {
                $file =$request->file('image');
                $filename=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/category',$filename);
                $category->image=$filename;
            }
            $category->meta_title=$data['meta_title'];
            $category->meta_description=$data['meta_description'];
            $category->meta_keyword=$data['meta_keyword'];
            $category->navbar_status=$request->navbar_status== true ? '1':'0';
            $category->status=$request->status== true ? '1':'0';
            $category->create_by=Auth::user()->id;

            $category->save();

            return redirect('admin/categories')->with('msg','Category Added Successfully' );
    }
    public function edit($category_id)
    {
           $category=Category::find($category_id);
           return view('admin.categories.edit', compact('category')); 
    }
    public function update(CategoriesFromRequest $request, $category_id)
    {
        $data=$request->validated();

        $category=Category::find($category_id);

        $category->name=$data['name'];
        $category->slug=Str::slug($data['slug']);
        $category->description=$data['description'];
        if($request->hasfile('image'))
        {
            $destination ='uploads/category/'.$category->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file =$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category',$filename);
            $category->image=$filename;
        }
        $category->meta_title=$data['meta_title'];
        $category->meta_description=$data['meta_description'];
        $category->meta_keyword=$data['meta_keyword'];
        $category->navbar_status=$request->navbar_status== true ? '1':'0';
        $category->status=$request->status== true ? '1':'0';
        $category->create_by=Auth::user()->id;

        $category->update();

        return redirect('admin/categories')->with('msg','Category Updated Successfully' );
 
    }
    public function delete($category_id)
    {
        $category=Category::find($category_id);
        if($category)
        {
            $destination ='uploads/category/'.$category->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $category->posts()->delete();
            $category->delete();

            return redirect('admin/categories')->with('msg','Category Deleted with its Post Successfully' );
        }
        else
        {
            return redirect('admin/categories')->with('msg','Category Not Deleted ID Not Found' );
        }

    }
}
