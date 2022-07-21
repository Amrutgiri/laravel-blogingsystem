@extends('layouts.master')

@section('title','Edit Post')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4" style="width:60rem">
        <div class="card-header">
                <h3>Edit Posts
                <a href="{{url('admin/posts')}}" class="btn btn-danger float-end "> Back</a></h3>
        </div>
        <div class="card-body">
            <form action="{{url('admin/update-post/'.$post->id)}}" method="POST">
                @csrf
                @method('PUT')
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                    </div>
                                @endif
                <div class="mb-3">
                    <label for=""> Category ID</label>
                    <select name="category_id" required  class="form-control" id="">
                    <option value="select">-- Select Category ---</option>
                         @foreach($category as $catitems)
                        <option value="{{$catitems->id}}" {{$post->category_id == $catitems->id ? 'selected':''}}>
                            {{$catitems->name}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{$post->name}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{$post->slug}}"class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea id="" cols="30" name="description" rows="5" class="form-control">{{$post->description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Youtube Iframe link</label>
                    <input type="text" name="yt_iframe" value="{{$post->yt_iframe}}" class="form-control">
                </div>

                <h3>SEO tags</h3>
                <div class="mb-3">
                    <label for="">Meta title</label>
                    <input type="text" name="meta_title" value="{{$post->meta_title}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <input type="text" name="meta_description" value="{{$post->meta_description}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <input type="text" name="meta_keyword" value="{{$post->meta_keyword}}" class="form-control">
                </div>
               
                <h3>Status</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{$post->status=='1'? 'checked':''}} >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success float-end">Update Post</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>




</div>


@endsection