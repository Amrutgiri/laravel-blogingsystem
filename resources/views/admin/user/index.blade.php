@extends('layouts.master')

@section('title','View Users')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
                    <div class="card-header">
                            <h4>View User </h4>
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
                                <th>UserName</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                             
                            </tr>
                            <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->role_as=='1'?'Admin':'User'}}</td>
                                        <td>
                                            <a href="{{url('admin/users/'.$item->id)}}" class="btn btn-warning">Edit</a>
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