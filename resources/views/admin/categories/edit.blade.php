@extends('layouts.master')

@section('title',' Update Categories')

@section('content')

<div class="container-fluid px-4">
                                            
                        <div class="card mt-4" style="width:60rem;">
                            <div class="card-header">
                                <h3 class="">Update Categories</h3>
                            </div>
                            <div class="card-body">
                               
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                    </div>
                                @endif
                                
                                <form action="{{ url('admin/update-categories/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" value="{{$category->name}}" name="name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Slug</label>
                                        <input type="text" class="form-control"value="{{$category->slug}}" name="slug">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Description</label>
                                        <textarea cols="5" class="form-control"  name="description">{{$category->description}}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Select Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <h3>SEO Tags</h3>
                                    <div class="mb-3">
                                        <label for="">Meta Title</label>
                                        <input type="text" class="form-control" value="{{$category->meta_title}}" name="meta_title">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Meta Description</label>
                                        <textarea cols="5" class="form-control"  name="meta_description">{{$category->meta_description}}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Meta Keyword</label>
                                        <textarea cols="5" class="form-control"  name="meta_keyword">{{$category->meta_keyword}}</textarea>
                                    </div>
                                    <h3>Navebar Status</h3>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="">Navbar Status</label>
                                            <input type="checkbox" namae="navbar_status" {{$category->navbar_status=='1' ? 'checked':''}}>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" namae="status" {{$category->status=='1' ? 'checked':''}}>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">Update Category</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
</div>

@endsection