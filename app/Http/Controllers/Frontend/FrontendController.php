<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $settings=Settings::find(1);
        $categories=Category::where('status','0')->get();
        $latesht_posts=Post::where('status','0')->orderBy('created_at','DESC')->get()->take(5);
        return view('Frontend.index',compact('categories','latesht_posts','settings'));
    }
    public function ViweCategoryPost(string $category_slug)
    {
        $category=Category::where('slug',$category_slug)->where('status','0')->first();
        if($category)
        {
            $post=Post::where('category_id',$category->id)->where('status','0')->paginate(3);
            return view('Frontend.post.index',compact('post','category'));
        }
        else
        {
            return redirect('/');
        }
        
    }
    public function ViewPost(string $category_slug, string $post_slug)
    {
        $category=Category::where('slug',$category_slug)->where('status','0')->first();
        if($category)
        {
            $post=Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status','0')->first();
            $latesht_posts=Post::where('category_id',$category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(5);
            return view('Frontend.post.view',compact('post','latesht_posts'));
        }
        else
        {
            return redirect('/');
        }
    }
}
