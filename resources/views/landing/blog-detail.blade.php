@extends('layouts.user.app')

@section('title', 'Blog Details - Turmet')

@section('content')

    <!-- breadcrumb-wrappe-Section Start -->
    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url('{{ asset('assets/images-user/breadcrumb/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2>Blog Details</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="{{ route('landing') }}">Home</a></li>
                        <li><i class="fa-solid fa-chevrons-right"></i></li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- News-details-Section Start -->
    <section class="news-details fix section-padding">
        <div class="container">
            <div class="news-details-area">
                <div class="row g-5">
                    <div class="col-12 col-lg-8">
                        <div class="blog-post-details">
                            <div class="single-blog-post">
                                @php
                                    $img = $post->featured_image ? \Illuminate\Support\Facades\Storage::url($post->featured_image) : asset('assets/images-user/news/post-4.jpg');
                                    $date = $post->published_at ?? $post->created_at;
                                @endphp

                                <div class="post-featured-thumb"
                                    style="position:relative; border-radius:12px; overflow:hidden;">
                                    <img src="{{ $img }}" alt="{{ $post->title }}" class="img-fluid w-100"
                                        style="height:460px; object-fit:cover; display:block;">

                                    <!-- date badge: match listing style (blue rounded box) -->
                                    <div class="post" style="position:absolute; left:24px; top:24px; z-index:5;">
                                        <h3
                                            style="background:#15b6c8; color:#fff; display:inline-block; padding:12px 14px; border-radius:8px; margin:0; font-size:18px; line-height:1; text-align:center;">
                                            {{ $date->format('d') }} <span
                                                style="display:block; font-size:13px;">{{ $date->format('M') }}</span>
                                        </h3>
                                    </div>
                                </div>

                                <div class="post-content">
                                    <ul class="post-list d-flex align-items-center">
                                        <li><i class="fa-regular fa-user"></i> By {{ $post->user->name ?? 'Admin' }}</li>
                                        <li><i class="fa-regular fa-comment"></i> {{ $post->comments_count ?? '0' }}
                                            Comments</li>
                                        <li><i class="fa-solid fa-tag"></i> {{ $post->category->name ?? 'Uncategorized' }}
                                        </li>
                                    </ul>
                                    <h3>{{ $post->title }}</h3>
                                    <p class="mb-3">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 180) }}
                                    </p>
                                    {!! $post->content !!}

                                    @if($post->gallery && is_array($post->gallery))
                                        <div class="row g-4">
                                            @foreach($post->gallery as $g)
                                                <div class="col-lg-6">
                                                    <div class="details-image"><img
                                                            src="{{ \Illuminate\Support\Facades\Storage::url($g) }}" alt="img">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="hilight-text mt-4 mb-4">
                                        <p>{{ $post->excerpt ?? '' }}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="row tag-share-wrap mt-4 mb-5">
                                <div class="col-lg-8 col-12">
                                    <div class="tagcloud">
                                        <a href="#">Travel</a>
                                        <a href="#">Services</a>
                                        <a href="#">Agency</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 mt-3 mt-lg-0 text-lg-end">
                                    <div class="social-share">
                                        <span class="me-3">Share:</span>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- comments & form (static) -->
                            <div class="comments-area">
                                <div class="comments-heading">
                                    <h3>02 Comments</h3>
                                </div>
                                <div class="blog-single-comment d-flex gap-4 pt-4 pb-4">
                                    <div class="image"><img src="{{ asset('assets/images-user/news/comment.png') }}"
                                            alt="image"></div>
                                    <div class="content">
                                        <div class="head d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                            <div class="con">
                                                <h5><a href="#">Leslie Alexander</a></h5><span>February 10, 2024 at 2:37
                                                    pm</span>
                                            </div>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                        <p class="mt-30 mb-4">Neque porro est qui dolorem ipsum quia quaed inventor
                                            veritatis et quasi architecto...</p>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-form-wrap pt-5">
                                <h3>Leave a comments</h3>
                                <form action="#" id="contact-form" method="POST">
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="form-clt"><span>Your Name*</span><input type="text" name="name"
                                                    placeholder="Your Name"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-clt"><span>Your Email*</span><input type="text" name="email"
                                                    placeholder="Your Email"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-clt"><span>Message*</span><textarea name="message"
                                                    placeholder="Write Message"></textarea></div>
                                        </div>
                                        <div class="col-lg-6"><button type="submit" class="theme-btn">post comment<i
                                                    class="fa-solid fa-arrow-right-long"></i></button></div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="main-sideber">
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Search</h4>
                                </div>
                                <div class="search-widget">
                                    <form action="#"><input type="text" placeholder="Search here"><button type="submit"><i
                                                class="fa-solid fa-magnifying-glass"></i></button></form>
                                </div>
                            </div>

                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Services</h4>
                                </div>
                                <div class="news-widget-categories">
                                    <ul>
                                        <li><a href="#">Travel</a><span>04</span></li>
                                        <li><a href="#">System</a><span>03</span></li>
                                        <li><a href="#">Agency</a><span>02</span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Recent Post</h4>
                                </div>
                                <div class="recent-post-area">
                                    @php
                                        // limit recent posts to 3 and eager load user
                                        $recent = \App\Models\Post::published()->latest('published_at')->take(3)->with('user')->get();
                                    @endphp
                                    @foreach($recent as $r)
                                        <div class="recent-items"
                                            style="display:flex; gap:10px; align-items:center; padding:1px 0;">
                                            <div class="recent-thumb"
                                                style="width:78px; height:78px; flex:0 0 78px; border-radius:10px; overflow:hidden; background:#e9e9e9;">
                                                <img src="{{ $r->featured_image ? \Illuminate\Support\Facades\Storage::url($r->featured_image) : asset('assets/images-user/news/pp1.jpg') }}"
                                                    alt="img" style="width:100%; height:100%; object-fit:cover; display:block;">
                                            </div>
                                            <div class="recent-content" style="flex:1;">
                                                <ul style="margin:0; padding:0; list-style:none;">
                                                    <li style="display:flex; align-items:center; gap:8px; margin:0 0 4px 0;">
                                                        <i class="fa-regular fa-calendar"
                                                            style="color:#ff7a00; font-size:16px;"></i>
                                                        <span
                                                            style="color:#15b6c8; font-weight:600; font-size:16px;">{{ $r->published_at ? $r->published_at->format('d M, Y') : $r->created_at->format('d M, Y') }}</span>
                                                    </li>
                                                </ul>
                                                <h6 style="margin:0; font-size:18px; line-height:1.2;"><a
                                                        href="{{ route('landing.blog.show', $r->slug) }}"
                                                        style="color:#0b2b2f;">{{ $r->title }}</a></h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Tags</h4>
                                </div>
                                <div class="news-widget-categories">
                                    <div class="tagcloud"><a href="#">Agency</a><a href="#">Traveling</a><a
                                            href="#">Design</a></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection