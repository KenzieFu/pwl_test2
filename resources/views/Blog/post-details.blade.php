@extends('layouts.template')
@section('content')
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Post Details</h4>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Banner Ends Here -->

<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="images/blog-post-02.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <a href="/searchcate/{{ $post->category->id }}"><span>{{ $post->category->name }}</span></a>
                                    <a href="post-details.html">
                                        <h4>{{ $post->title }}</h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="/about/{{ $post->user->id }}">{{ $post->user->name }}</a></li>
                                        <li><a href="#">{{ $post->created_at }}</a></li>
                                        {{-- <li><a href="#">10 Comments</a></li> --}}
                                    </ul>
                                </div>
                                {!! $post->content !!}
                            </div>
                        </div>

                        
                        @if(Auth::check())
                        <div class="col-lg-12">
                            <div class="sidebar-item submit-comment">
                                <div class="sidebar-heading">
                                    <h2>Your comment</h2>
                                </div>
                                <div class="content">
                                    <form id="comment" action="{{ route('send') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input name="postId" hidden value="{{ $post->id }}">
                                                <fieldset>
                                                    <textarea name="comment" rows="6" id="message"
                                                        placeholder="Type your comment" required=""></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <button type="submit" id="form-submit"
                                                        class="main-button">Submit</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="sidebar-item comments">
                                
                                <div class="content mb-5">
                                    <ul>
                                        @foreach ($post->users as $comment)
                                            @if($comment->pivot->parent == 0)
                                                <li>
                                                    <div class="author-thumb">
                                                        <img src="/storage/{{ $comment->image }}" alt="....">
                                                    </div>
                                                    <div class="right-content">
                                                        <h4>{{ $comment->name }}<span>{{ $comment->pivot->created_at }}</span></h4>
                                                        {{ $comment->pivot->comment }}
                                                    </div>
                                                </li>

                                                @if(Auth::check())
                                                <div class="sidebar-heading">
                                                    <h2>Reply</h2>
                                                </div>
                                                <div class="content">
                                                    <form id="comment" action="{{ route('reply') }}" method="POST">
                                                        @csrf
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <input name="postId" hidden value="{{ $post->id }}">
                                                            <input name="commentId" hidden value="{{ $comment->pivot->id }}">
                                                            <fieldset>
                                                                <textarea name="comment" rows="6" id="message"
                                                                placeholder="Type your comment" required=""></textarea>
                                                            </fieldset>
                                                        </div>
                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <button type="submit" id="form-submit"
                                                                class="main-button">Submit</button>
                                                        </fieldset>
                                                    </div>
                                                </form>
                                                </div>
                                                @endif
                                      







                                        
                                        @foreach($comments as $com)
                                            @if($comment->pivot->id == $com->parent )
                                        <li class="replied">
                                            <div class="author-thumb">
                                                <img src="/storage/{{ $com->user->image }}" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>{{ $com->user->name }}<span>{{ $com->created_at }}</span></h4>
                                                <p>{{ $com->comment }}</p>
                                            </div>
                                        </li>
                                            @endif
                                        @endforeach
                                            @endif
                                    @endforeach
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Let's make your version post</h5>
                        <p class="card-text">Interested in making a post that helps a lot of people?</p>
                        <a href="{{ route('createpost') }}" class="btn btn-warning btn-block mt-2" role="button" style="background-color: #f48840; color: white;">Create A
                        Post</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection