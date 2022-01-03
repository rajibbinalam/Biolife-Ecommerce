@extends('partials.app')

@section('content')
<!--Hero Section-->
<div class="hero-section hero-background style-02">
    <h1 class="page-title">Organic Fruits</h1>
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="{{route('home')}}" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Our Blog</span></li>
        </ul>
    </nav>
</div>

<!-- Page Contain -->
<div class="page-contain blog-page">
    <div class="container">
        <!-- Main content -->
        <div id="main-content" class="main-content">

            <div class="row">

                <!--articles block-->
                <ul class="posts-list main-post-list">
                    @foreach ($blog_posts as $blog_post)
                        
                        <li class="post-elem col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="post-item effect-04 style-bottom-info">
                                <div class="thumbnail">
                                    <a href="{{url('/blogs/'.$blog_post->id.'/'.$blog_post->title)}}" class="link-to-post"><img src="{{asset($blog_post->image)}}" width="370" height="270" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name"><a href="{{url('/blogs/'.$blog_post->id.'/'.$blog_post->title)}}" class="linktopost">{{$blog_post->title}}</a></h4>
                                    <p class="post-archive"><b class="post-cat">{{$blog_post->blogcategory->name}}</b><span class="post-date"> / {{ $blog_post->created_at->format('d-M-Y - h:i A') }}</span><span class="author">Posted: {{$blog_post->auth_name}}</span></p>
                                    <p class="excerpt">{{ Str::limit(strip_tags(htmlspecialchars_decode($blog_post->details)), 120, ' ...') }}</p>
                                    <div class="group-buttons">
                                        <a href="{{url('/blogs/'.$blog_post->id.'/'.$blog_post->title)}}" class="btn readmore">read more</a>
                                        <a href="" class="btn count-number liked"><i class="biolife-icon icon-heart-1"></i><span class="number">20</span></a>
                                        <a href="" class="btn count-number commented"><i class="biolife-icon icon-conversation"></i><span class="number">06</span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    
                </ul>

            </div>

            <!--Panigation Block-->
            {{-- <div class="biolife-panigations-block ">
                <ul class="panigation-contain">
                    <li><span class="current-page">1</span></li>
                    <li><a href="#" class="link-page">2</a></li>
                    <li><a href="#" class="link-page">3</a></li>
                    <li><span class="sep">....</span></li>
                    <li><a href="#" class="link-page">20</a></li>
                    <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                </ul>
            </div> --}}

        </div>
    </div>
</div>
@endsection