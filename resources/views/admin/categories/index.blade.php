@extends('layouts.master')

@section('title','Categories')

@section('content')

<div class="container-fluid px-4">
                        
                <div class="card mt-4">
                    <div class="card-header">
                            <h4>View Category <a href="{{url('admin/add-categories')}}" class="btn btn-primary btn-sm float-end">Add Category</a></h4>
                    </div>  
                    <div class="card-body">
                        @if(session('msg'))
                            <div class="alert alert-success">{{session('msg')}}</div>
                        @endif
                        <div class="table-responsive">
                    <table class="table table-bodered" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <tbody>
                                @foreach($category as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <img src="{{asset('uploads/category/'.$item->image)}}" width="50px" height="50px" alt="">

                                        </td>
                                        <td>{{$item->status=='1'?'Hidden':'Shown'}}</td>
                                        <td>
                                            <a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{url('admin/delete-categories/'.$item->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
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