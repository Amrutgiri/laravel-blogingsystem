@extends('layouts.master')

@section('title','Admin Blog Post view')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
                <h3>View Posts
                <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add New Post</a>
                </h3>
        </div>
        <div class="card-body">
                        @if(session('msg'))
                            <div class="alert alert-success">{{session('msg')}}</div>
                        @endif
            <div class="table-responsive">
            <table class="table table-border" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Post Name</th>
                        <th>Status</th>
                        <th style="text-align:center">Action</th>
                    </tr>                    
                    <tbody>
                        @foreach($posts as $postitems)
                            <tr>
                                <td>{{$postitems->id}}</td>
                                <td>{{$postitems->category->name}}</td>
                                <td>{{$postitems->name}}</td>
                                <td>{{$postitems->status=='1'?'Hidden':'Visible'}}</td>
                                <td style="text-align:center"><a href="{{url('admin/post/'.$postitems->id)}}" class="btn btn-warning">Edit</a>
                                <a href="{{url('admin/delete-post/'.$postitems->id)}}" class="btn btn-dark">Delete</a></td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
            </div>
        </div>
    </div>




</div>


@endsection