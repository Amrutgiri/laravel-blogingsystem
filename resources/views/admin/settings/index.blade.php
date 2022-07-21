@extends('layouts.master')

@section('title','Site Setting')

@section('content')

<div class="container-fluid px-4">
                        
                        <div class="row mt-3">
                        <div class="col-md-12">
                            @if(session('msg'))
                                <h3 class="alert alert-warning">{{session('msg')}}</h3>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h3>Website Setting</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{url('admin/settings')}}" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                        <div class="mb-3">
                                            <label for="">Website Name</label>
                                            <input type="text" name="website_name" require @if($settings) value="{{$settings->website_name}}" @endif class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Website Logo</label>
                                            <input type="file" name="logo" require class="form-control">
                                            @if($settings)
                                                <img src="{{asset('uploads/settings/'.$settings->logo)}}" class="responsive mt-2" width="100px" height="50px" alt="logo">
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Website Fevicon</label>
                                            <input type="file" name="favicon" class="form-control">
                                            @if($settings)
                                                <img src="{{asset('uploads/settings/'.$settings->favicon)}}" class="responsive mt-2" width="100px" height="50px" alt="logo">
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Website description</label>
                                            <textarea name="description"  rows="5" class="form-control">@if($settings) {{$settings->description}} @endif</textarea>
                                        </div>

                                        <h4>SEO - Meta Tags</h4>
                                        <div class="mb-3">
                                            <label for="">Meta title</label>
                                            <input type="text" name="meta_title" @if($settings) value="{{$settings->meta_title}}" @endif class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Meta Keyword</label>
                                            <textarea name="meta_keyword"  rows="5" class="form-control">@if($settings){{$settings->meta_keyword}} @endif</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Meta description</label>
                                            <textarea name="meta_description"  rows="5" class="form-control">@if($settings) {{$settings->meta_description}} @endif</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        </div>
</div>
@endsection