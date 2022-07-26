@extends('layouts.app')

@section('title',"$post->meta_title")

@section('meta_description',"$post->meta_description")

@section('meta_keyword',"$post->meta_keyword")

@section('content')

<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="category-heading">
                    <h3>{!! $post->name!!}</h3>
                </div>
                    <div class="mt-3">
                        <h6>{{ $post->category->name.'/'.$post->name}}</h6>
                    </div>
                    <div class="card card-shadow mt-4 ">
                        <div class="card-body post-description">
                        {!! $post->description!!}
                        </div>
                    </div>
            </div>


            <div class="col-md-3">
                    <div class="border p-2 my-2">
                        <h3>adverties here</h3>
                    </div>
                  
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>

                        <div class="card-body">
                            @foreach($latesht_posts as $postitems)
                            <a href="{{url('tutorial/'.$postitems->category->slug.'/'.$postitems->slug)}}" class="text-decoration-none">
                                <h6>
                                  -  {{$postitems->name}}
                                </h6>
                            </a>
                            @endforeach
                        </div>
                    </div>
            </div>
                    <div class="comment-area-mt-4">
                        @if(session('msg'))
                            <h6 class="alert alert-warnning mb-3">{{ session('msg')}}</h6>
                        @endif
                        <div class="card card-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{url('comments')}}" method="POST">
                                @csrf
                                <input type="hidden" name="post_slug" value="{{$post->slug}}">
                                <textarea name="comment_body" class="form-control" rows="3" require></textarea>
                                <button class="btn btn-primary mt-3" type="submit"> Submit</button>
                            </form>
                        </div>
                        @forelse($post->comment as $comment)
                        <div class="comment-container card card-body shadow-sm mt-3">
                            <div class="detail-area">
                                <h6 class="user-name mb-1">
                                    @if($comment->user)
                                        {{$comment->user->name}}
                                    @endif
                                    <small class="ms-3 text-primary">Comment on : {{$comment->created_at->format('d-m-Y')}}</small>
                                </h6>
                                <p class="user-comment mb-1">
                                    {!! $comment->comment_body!!}
                                </p>
                            </div>
                            @if(Auth::check() && Auth::id()== $comment->user_id)
                            <div>
                                <button type="button" value="{{$comment->id}}"  class="deletecomment btn btn-danger btn-sm me-2">Delete</button>
                            </div>
                            @endif
                        </div>
                       @empty
                                <h6>No comments</h6>
                       @endforelse
                    </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
            $(document).ready(function(){
                $.ajaxSetup({
                    header:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                   $(document).on('click', '.deletecomment',function(){
                            
                    if(confirm('Are You Want to Delete Comment ?'))
                    {
                        var thisClicked =$(this);
                        var comment_id =thisClicked.val();
                        
                        $.ajax({
                            type:"POST",
                            url:"{{url('delete-comment')}}",
                            data:{
                                'comment_id':comment_id,
                                _token:"{{csrf_token()}}"
                            },
                            
                            success:function(res){
                                if(res.status == 200){
                                    thisClicked.closest('.comment-container').remove();
                                    alert(res.massage);
                                }
                                else{

                                    alert(res.massage);
                                }

                            }
                        });
                    }
                   }); 
            });
    </script>

@endsection