@extends('layouts.user.app')

@section('title', 'Blog')

@section('content')

    <!-- breadcrumb-wrappe-Section Start -->
    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url('{{ asset('assets/images-user/breadcrumb/breadcrumb2.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2>Destination</h2>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('landing') }}">Home</a>
                        </li>
                        <li><i class="fa-solid fa-chevrons-right"></i></li>
                        <li>Destination</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- News-Section Start -->
    <section class="news-section section-padding fix">
        <div class="container">
            @if(!empty($activeCategoryName))
                <div class="mb-4">
                    <h3>Category: {{ $activeCategoryName }}</h3>
                </div>
            @endif
            <div class="row g-4">
                @forelse ($posts as $post)
                    <div class="col-xl-4 col-md-6 col-lg-6 wow fadeInUp">
                        <div class="news-card-items-3 mt-0">
                            <div class="news-image">
                                @php
                                    $img = $post->featured_image
                                        ? \Illuminate\Support\Facades\Storage::url($post->featured_image)
                                        : asset('assets/images-user/news/08.jpg');
                                @endphp
                                <img src="{{ $img }}" alt="{{ $post->title }}" class="img-fluid w-100"
                                    style="height:260px; object-fit:cover; border-radius:12px;">
                            </div>
                            <div class="news-content">
                                <ul class="post-meta">
                                    <li class="post">
                                        {{ $post->published_at ? $post->published_at->format('d') : $post->created_at->format('d') }}<span>{{ $post->published_at ? $post->published_at->format('M') : $post->created_at->format('M') }}</span>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        {{ $post->user->name ?? 'Admin' }}
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-tag"></i>
                                        @if($post->category)
                                            <a href="{{ route('landing.blog', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a>
                                        @else
                                            Uncategorized
                                        @endif
                                    </li>
                                </ul>
                                <h4>
                                    <a href="{{ route('landing.blog.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <a href="{{ route('landing.blog.show', $post->slug) }}" class="link-btn">Read More <i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No posts found.</p>
                    </div>
                @endforelse
            </div>

            <div class="page-nav-wrap text-center mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </section>

@endsection