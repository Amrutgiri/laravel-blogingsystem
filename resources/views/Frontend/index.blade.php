@extends('layouts.app')

@section('title',"$settings->meta_title")

@section('meta_description',"$settings->meta_description")

@section('meta_keyword',"$settings->meta_keyword")

@section('content')

<div class="bg-warning py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            <div class="owl-carousel category-carousel owl-theme">
                @foreach($categories as $catitems)
                <div class="item">
                    <a href="{{url('tutorial/'.$catitems->slug)}}" class="text-decoration-none">
                        <div class="card "> 
                            <img src="{{ asset('uploads/category/'. $catitems->image)}}" class="rounded" alt="images" width="100px" height="200px">
                            <div class="card-body text-center ">
                                <h4 class="text-dark">{{ $catitems->name}}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Execellent Web World</h3>
                <div class="underline"></div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta mollitia accusamus nulla quis magni minus, consequuntur expedita dolorum, harum beatae neque numquam nesciunt autem atque, tempora odit nostrum sint similique?
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta mollitia accusamus nulla quis magni minus, consequuntur expedita dolorum, harum beatae neque numquam nesciunt autem atque, tempora odit nostrum sint similique?
                    </p>
                
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>All Category List</h3>
                <div class="underline"></div>
            </div>
                @foreach($categories as $catlist)
                <div class="col-md-3">
                    <div class="card card-body mb-3">
                        <a href="{{url('tutorial/'.$catlist->slug)}}" class="text-decoration-none">
                            <h5 class="text-center text-decoration-none text-dark mb-0">{{ $catlist->name}}</h5>
                        </a>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Latest Posts</h3>
                <div class="underline"></div>
            </div>
            <div class="col-md-9">
                @foreach($latesht_posts as $postlist)
                        <div class="card card-body bg-gray shadow mb-3">
                            <a href="{{url('tutorial/'.$postlist->category->slug.'/'.$postlist->slug)}}" class="text-decoration-none">
                                <h5 class="text-decoration-none text-dark mb-0">{{ $postlist->name}}</h5>
                            </a>
                            <h6>Post on: {{$postlist->created_at->format('d-m-Y')}}</h6>
                        </div>
                @endforeach
            </div>
            <div class="col-md-3">
                <div class="border text-center p-3">
                   <h4>Advertiesment Here </h4> 
                </div>
            </div>
                
        </div>
    </div>
</div>

@endsection 