@extends('partials.app')

@section('content')
 <!--Hero Section-->
 <div class="hero-section hero-background style-02">
    <h1 class="page-title">Blog of Fruits</h1>
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="{{route('home')}}" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">{{$single->title}}</span></li>
        </ul>
    </nav>
</div>

<!-- Page Contain -->
<div class="page-contain blog-page left-sidebar">
    <div class="container">
        <div class="row">

            <!-- Main content -->
            <div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">

                <!--Single Post Contain-->
                <div class="single-post-contain">

                    <div class="post-head">
                        <div class="thumbnail">
                            <figure><img src="{{asset($single->image)}}" width="870" height="635" alt=""></figure>
                        </div>
                        <h2 class="post-name">{{$single->title}}</h2>
                        <p class="post-archive"><b class="post-cat">ORGANIC</b><span class="post-date"> / {{ $single->created_at->format('d-M-Y - h:i A') }}</span><span class="author">Posted By: {{$single->auth_name}}</span></p>
                    </div>

                    <div class="post-content">
                        <p>{{strip_tags(htmlspecialchars_decode($single->details))}}</p>
                        
                    </div>

                    <div class="post-foot">

                        <div class="post-tags">
                            <span class="tag-title">Tags:</span>
                            <ul class="tags">
                                @if(isset(explode(',',$single->tags)[0]))
                                    <li><a href="" class="tag-link">{{explode(',',$single->tags)[0]}}</a></li>
                                @endif
                                @if(isset(explode(',',$single->tags)[1]))
                                    <li><a href="" class="tag-link">{{explode(',',$single->tags)[1]}}</a></li>
                                @endif
                                @if(isset(explode(',',$single->tags)[2]))
                                    <li><a href="" class="tag-link">{{explode(',',$single->tags)[2]}}</a></li>
                                @endif
                                @if(isset(explode(',',$single->tags)[3]))
                                    <li><a href="" class="tag-link">{{explode(',',$single->tags)[3]}}</a></li>
                                @endif
                                @if(isset(explode(',',$single->tags)[4]))
                                    <li><a href="" class="tag-link">{{explode(',',$single->tags)[4]}}</a></li>
                                @endif
                                @if(isset(explode(',',$single->tags)[5]))
                                    <li><a href="" class="tag-link">{{explode(',',$single->tags)[5]}}</a></li>
                                @endif
                            </ul>
                        </div>

                        <div class="auth-info">
                            <div class="ath">
                                <a href="#" class="avata"><img src="customer-image" width="29" height="28" alt="">Customer Name</a>
                                <span class="count-item viewer"><i class="fa fa-eye" aria-hidden="true"></i>630</span>
                                <span class="count-item commented"><i class="fa fa-commenting" aria-hidden="true"></i>26</span>
                            </div>
                            <div class="socials-connection">
                                <span class="title">Share:</span>
                                <ul class="social-list">
                                    @foreach($socials as $social)
                                        <li><a href="{{$social->link}}" class="socail-link"><i class="{{$social->icon_class}}" aria-hidden="true"></i></a></li>
                                     @endforeach
                                    
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

                <!--Comment Block-->
                <div class="post-comments">
                    <h3 class="cmt-title">Comments<sup>(26)</sup></h3>

                    <div class="comment-form">
                        <form action="#" method="post" name="frm-post-comment">
                            <p class="form-row">
                                <textarea name="txt-comment" id="txt-comment-ath-3364" cols="30" rows="10" placeholder="Write your comment"></textarea>
                                <a href="#" class="current-author"><img src="assets/images/blogpost/viewer-avt.png" width="41" height="41" alt=""></a>
                            </p>
                            <p class="form-row last-btns">
                                <button type="submit" class="btn btn-sumit">post a comment</button>
                                <a href="#" class="btn btn-fn-1"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
                                <a href="#" class="btn btn-fn-1"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                                <a href="#" class="btn btn-fn-1"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                            </p>
                        </form>
                    </div>

                    <div class="comment-list">

                        <ol class="post-comments lever-0">
                            <li class="comment-elem">
                                <div class="wrap-post-comment">

                                    <div class="cmt-inner">
                                        <div class="auth-info">
                                            <a href="#" class="author-contact"><img src="assets/images/blogpost/author-02.png" alt="" width="29" height="28">Christiano Bale</a>
                                            <span class="cmt-time">4 days ago</span>
                                        </div>
                                        <div class="cmt-content">
                                            <p>Nam sed eleifend dui, eu eleifend leo.Mauris ornare eros quis placerat mollis. Duis ornare euismod risus at dictum. Proin<br>
                                                at porttitor metus. Nunc luctus nisl suscipit, hendrerit ligula non.</p>
                                        </div>
                                        <div class="cmt-fooot">
                                            <a href="#" class="btn btn-response"><i class="fa fa-commenting" aria-hidden="true"></i>Comment</a>
                                            <a href="#" class="btn btn-like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>9</a>
                                            <a href="#" class="btn btn-dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>1</a>
                                        </div>
                                    </div>

                                    <div class="comment-resposes">
                                        <ol class="post-comments lever-1">
                                            <li class="comment-elem">
                                                <div class="wrap-post-comment">
                                                    <div class="cmt-inner">
                                                        <div class="auth-info">
                                                            <a href="#" class="author-contact"><img src="assets/images/blogpost/author-03.png" alt="" width="29" height="28">Samuel Godi</a>
                                                            <span class="cmt-time">4 days ago</span>
                                                        </div>
                                                        <div class="cmt-content">
                                                            <p>Ut pellentesque gravida justo non rhoncus. Nunc ullamcorper tortor id aliquet luctus. Proin varius aliquam<br>
                                                                consequat.Curabitur a commodo diam, vitae pellentesque urna.</p>
                                                        </div>
                                                        <div class="cmt-fooot">
                                                            <a href="#" class="btn btn-response"><i class="fa fa-commenting" aria-hidden="true"></i>Comment</a>
                                                            <a href="#" class="btn btn-like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>9</a>
                                                            <a href="#" class="btn btn-dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>1</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>

                                </div>
                            </li>
                        </ol>

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

            <!-- Sidebar -->
            <aside id="sidebar" class="sidebar blog-sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">

                <div class="biolife-mobile-panels">
                    <span class="biolife-current-panel-title">Sidebar</span>
                    <a class="biolife-close-btn" href="#" data-object="open-mobile-filter">&times;</a>
                </div>

                <div class="sidebar-contain">

                    <!--Search Widget-->
                    <div class="widget search-widget">
                        <div class="wgt-content">
                            <form action="#" name="frm-search" method="get" class="frm-search">
                                <input type="text" name="s" value="" placeholder="SEACH..." class="input-text">
                                <button type="submit" name="ok"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <!--Categories Widget-->
                    <div class="widget biolife-filter">
                        <h4 class="wgt-title">Categories</h4>
                        <div class="wgt-content">
                            <ul class="cat-list">
                                @foreach ($blog_categories as $blog_category)
                                    <li class="cat-list-item"><a href="" class="cat-link">{{$blog_category->name}} (30)</a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>

                    <!--Posts Widget-->
                    <div class="widget posts-widget">
                        <h4 class="wgt-title">Recent post</h4>
                        <div class="wgt-content">
                            <ul class="posts">
                                @foreach ($recent_posts as $recent_post)
                                    
                                <li>
                                    <div class="wgt-post-item">
                                        <div class="thumb">
                                            <a href="{{url('/blogs/'.$recent_post->id.'/'.$recent_post->title)}}"><img src="{{asset($recent_post->image)}}" width="80" height="58" alt=""></a>
                                        </div>
                                        <div class="detail">
                                            <h4 class="post-name"><a href="{{url('/blogs/'.$recent_post->id.'/'.$recent_post->title)}}">{{$recent_post->title}}</a></h4>
                                            <p class="post-archive">{{$recent_post->created_at->format('h:i A | d-M-Y')}}
                                                <br><span class="comment">15 Comments</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

@endsection