@extends('layouts.master')

@section('title','Categories')

@section('content')

<div class="container-fluid px-4">
                                            
                        <div class="card mt-4" style="width:60rem;">
                            <div class="card-header">
                                <h3 class="">Add Categories</h3>
                            </div>
                            <div class="card-body">
                               
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                    </div>
                                @endif
                                
                                <form action="{{ url('admin/add-categories')}}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="mb-3">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Slug</label>
                                        <input type="text" class="form-control" name="slug">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Description</label>
                                        <textarea cols="5" id="mysummernote" class="form-control" name="description"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Select Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <h3>SEO Tags</h3>
                                    <div class="mb-3">
                                        <label for="">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Meta Description</label>
                                        <textarea cols="5" class="form-control" name="meta_description"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Meta Keyword</label>
                                        <textarea cols="5" class="form-control" name="meta_keyword"></textarea>
                                    </div>
                                    <h3>Navebar Status</h3>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="">Navbar Status</label>
                                            <input type="checkbox" namae="navbar_status">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox"  namae="status">
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">Save Category</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
</div>

@endsection