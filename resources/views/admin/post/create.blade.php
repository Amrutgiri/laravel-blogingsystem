@extends('layouts.master')

@section('title','Create Post')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4" style="width:60rem">
        <div class="card-header">
                <h3>Create Posts</h3>
        </div>
        <div class="card-body">
            <form action="{{url('admin/add-post')}}" method="POST">
                @csrf
                             @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                    </div>
                                @endif
                <div class="mb-3">
                    <label for=""> Category ID</label>
                    <select name="category_id" class="form-control" id="">
                        @foreach($category as $catitems)
                        <option value="{{$catitems->id}}">{{$catitems->name}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea cols="30" id="mysummernote" name="description" rows="5" class="form-control" >{{old('description')}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Youtube Iframe link</label>
                    <input type="text" name="yt_iframe" class="form-control" value="{{old('yt_iframe')}}">
                </div>

                <h3>SEO tags</h3>
                <div class="mb-3">
                    <label for="">Meta title</label>
                    <input type="text" name="meta_title" value="{{old('meta_title')}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <input type="text" name="meta_description" value="{{old('meta_description')}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <input type="text" name="meta_keyword" value="{{old('meta_keyword')}}" class="form-control">
                </div>
               
                <h3>Status</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" value="{{old('status')}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success float-end">Save Post</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>




</div>


@endsection