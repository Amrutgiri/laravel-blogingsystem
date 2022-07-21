<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Comments;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $validator = Validator::make($request->all(),[
                'comment_body' => 'required | string'
            ]);
            if($validator->fails())
            {
                return redirect()->back()->with('msg','Comment are is Mandatory');
            }
            $post=Post::where('slug',$request->post_slug)->where('status','0')->first();
            if($post)
            {
                Comments::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body,
                ]);
                return redirect()->back()->with('msg','Comment Added Successfully');
            }
            else
            {
                return redirect()->back()->with('msg','No such a Post Found');
            }
        }
        else
        {
            return redirect('login')->with('msg','Login first to Comment');
        }
    }

    public function destroy(Request $request)
    {
        if(Auth::check())
        {
            $comment=Comments::where('id',$request->comment_id)->where('user_id',Auth::user()->id)->first();
            
            if($comment)
            {
            $comment->delete();

            return response()->json([
                'status' => 200,
                'massage' =>'Comment Deleted Successfully'
            ]);
            }
            else
            {
                return response()->json([
                    'status' => 500,
                    'massage' =>'Something Went to Wrong'
                ]);
            }
        }
        else
        {
            return response()->json([
                'status' => 401,
                'massage' =>'Login to delete this Comment'
            ]);
        }
    }
}
