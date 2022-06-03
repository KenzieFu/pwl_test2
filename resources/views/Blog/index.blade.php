@extends('layouts.template')
@section('content')

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            @foreach($banners as $banner)

            <div class="item">
                <img src={{ asset('storage/'.$banner->thumb) }} width= "370" height= "340" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                           <a href="/searchcate/{{ $banner->category->id }}"> <span>{{ $banner->category->name }}</span></a>
                        </div>
                        <a href="/blog/{{ $banner->id }}">
                            <h4>{{ $banner->title }}</h4>
                        </a>
                        <ul class="post-info">

                            {{-- <li><a href="#">Admin</a></li> --}}
                            <li><a href="/about/{{ $banner->user->id }}">{{ $banner->user->name }}</a></li>
                            <li><a href="#">{{ $banner->created_at }}</a></li>
                            {{-- <li><a href="#">12 Comments</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if(!empty($message))
                   <h4 class="mb-3">Searching for : "{{ $message }}"</h4>
                @elseif(!empty($cate))
                   <h4 class="mb-3">Category : "{{ $cate }}"</h4>
                @endif
                <div class="all-blog-posts">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src={{ asset('storage/'.$post->thumb) }} width= "370" height= "340" alt="">
                                </div>
                                <div class="down-content">
                                    <a href="/searchcate/{{ $post->category->id }}"><span>{{ $post->category->name }}</span></a>
                                    <a href="/blog/{{ $post->id }}">
                                        <h4>{{ $post->title }}</h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="/about/{{ $post->user->id }}">{{ $post->user->name }}</a></li>
                                        <li><a href="#">{{ $post->created_at }}</a></li>
                                        {{-- <li><a href="#">12 Comments</a></li> --}}
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
            
            {{-- //Sidebar --}}
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Recent Posts</h2>
                                </div>
                                @foreach($recents as $recent)
                                <div class="down-content">
                                    <a href="/searchcate/{{ $recent->category->id }}"><span>{{ $recent->category->name }}</span></a>
                                    <a href="/blog/{{ $recent->id }}">
                                        <h4>{{ $recent->title }}</h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="/about/{{ $recent->user->id }}"><small>{{ $recent->user->name }}</small></a></li>
                                        <li><a href="#"><small>{{ $recent->created_at }}</small></a></li>
                                        {{-- <li><a href="#">12 Comments</a></li> --}}
                                    </ul>
                                    
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item categories">
                                <div class="sidebar-heading">
                                    <h2>Categories</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        @foreach($categories as $category)
                                        <li><a href="/searchcate/{{ $category->id }}">- {{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5"></div>
    </div>
</section>
@endsection
