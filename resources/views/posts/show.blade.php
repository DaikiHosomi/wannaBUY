@extends('layouts.app')

@section('content')


    <div class="head-container container">
        @if (session('status'))
        <div class="alert alert-warning" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <div class="top-card-header text-center">CommentPage </div>
                    <div class="post-card-body  my-3" >
                            <h5 class="card-title"><img src="{{$post->user->image}}" alt="" class="img-responsive img-thumbnail" style="height: 50px; width:50px;">
                                <p class="post-time" style="float:right;"> {{ $post->created_at }}</p>
                                    <a href="{{ route('users.show', $post->user_id)}}" class="post-name px-3">
                                    {{ $post->user->name }}</a></h5>
                                <h5 class="post-title card-title">{{ $post->title }}</h5>
                               
                                @auth
                                <a href="{{ route('postComments.create', ['post_id' => $post->id]) }}" class="btn btn-secondary float-left" mr-3><i class="far fa-comment-dots"></i></a>
                                @endauth

                            @if(Auth::user()->id === $post->user_id)
                            <!-- Button trigger modal -->
                            <button type="button" class="btn-light float-right" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fas fa-trash-alt "></i>
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">【確認】</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        投稿を本当に削除してもよろしいですか？
                                    </div>
                                    <div class="modal-footer">
                                        {!! delete_form(['posts', $post->id]) !!}
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endif
                            <a href="{{ route('posts.index') }}" class="btn btn-light float-right pt-1  mr-2">
                                <i class="fas fa-undo"></i>
                                </a>
                        
                       
                    </div>
                
            </div>
        </div> 
    
        

                    <div class="row justify-content-center">
                        <div class="col-11 mt-4">
                              @foreach($post->postComments as $postComment)
                                <div class="card">
                                    <div class="post-comment-body"> 
                                        <h5 class="card-title"><img src="{{$postComment->user->image}}" alt="" class="img-responsive img-thumbnail" style="height: 30px; width:30px;">
                                            <p class="post-time" style="float:right;"> {{ $postComment->created_at }}</p>
                                            <a href="{{ route('users.show', $postComment->user_id)}}" class="post-name px-3">
                                            {{ $postComment->user->name }}</a></h5>
                                                <p class=" post-title card-text">{{ $postComment->comment }}</p>

                                                    @if(Auth::user()->id === $postComment->user->id)

                                                    <form action="{{ route('postComments.destroy', $postComment->id)  }}" method="POST">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn-light float-right"  data-target="#exampleModalCenter"  onclick='return confirm("コメントを本当に削除しますか？");'>
                                                            <i class="fas fa-trash-alt"  style="float:right;"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                    </div>
                                </div>         
                                @endforeach
                        </div> 
                    </div> 
 </div> 
           
  
    
@endsection
