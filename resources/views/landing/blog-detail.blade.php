@extends('layouts.user.app')

@section('title', 'Destination Details')

@section('content')

    <!-- breadcrumb-wrappe-Section Start -->
    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url('{{ asset('assets/images-user/breadcrumb/breadcrumb3.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2>Destination Details</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="{{ route('landing') }}">Home</a></li>
                        <li><i class="fa-solid fa-chevrons-right"></i></li>
                        <li>Destination Details</li>
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
                                    // Jika gambar ada, langsung pakai URL dari Supabase
                                    $img = $post->featured_image
                                        ? 'https://vdynxiqtxltaayjewtrz.supabase.co/storage/v1/object/public/upload/' .
                                            ltrim($post->featured_image, '/')
                                        : asset('assets/images-user/news/post-4.jpg');

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
                                        <li><i class="fa-regular fa-comment"></i> {{ $post->comments->count() }} Comments
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-tag"></i>
                                            @if ($post->category)
                                                <a
                                                    href="{{ route('landing.blog', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a>
                                            @else
                                                Uncategorized
                                            @endif
                                        </li>
                                    </ul>
                                    <h3>{{ $post->title }}</h3>
                                    <!-- show full content on detail page only (removed duplicated truncated preview) -->
                                    {!! $post->content !!}

                                    @if ($post->gallery && is_array($post->gallery))
                                        <div class="row g-4">
                                            @foreach ($post->gallery as $g)
                                                <div class="col-lg-6">
                                                    <div class="details-image"><img
                                                            src="{{ \Illuminate\Support\Facades\Storage::url($g) }}"
                                                            alt="img">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    @php
                                        $excerpt = isset($post->excerpt) ? trim(strip_tags($post->excerpt)) : '';
                                        $plainContent = trim(strip_tags($post->content ?? ''));
                                    @endphp
                                    @if (!empty($excerpt) && $excerpt !== $plainContent)
                                        <div class="hilight-text mt-4 mb-4">
                                            <p>{{ $post->excerpt }}</p>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div class="row tag-share-wrap mt-4 mb-5">
                                <div class="col-lg-8 col-12">
                                    <div class="tagcloud">
                                        <a href="#">Wisata</a>
                                        <a href="#">Pariwisata</a>
                                        <a href="#">Destinasi</a>
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

                            <!-- comments & form -->
                            <div class="comments-area">
                                <div class="comments-heading">
                                    <h3>{{ $post->comments->count() }}
                                        Comment{{ $post->comments->count() !== 1 ? 's' : '' }}</h3>
                                </div>

                                @foreach ($post->comments as $comment)
                                    <div class="blog-single-comment d-flex gap-4 pt-4 pb-4"
                                        id="comment-{{ $comment->id }}">
                                        @php
                                            $name = trim($comment->name ?? '');
                                            $parts = preg_split('/\s+/', $name);
                                            $initials = '';
                                            if (!empty($parts)) {
                                                $initials .= strtoupper(mb_substr($parts[0], 0, 1));
                                                if (count($parts) > 1) {
                                                    $initials .= strtoupper(mb_substr($parts[1], 0, 1));
                                                }
                                            }
                                        @endphp
                                        <div class="image">
                                            <div class="comment-avatar"
                                                style="width:56px;height:56px;border-radius:50%;background:#15b6c8;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:18px;">
                                                {{ $initials ?: 'U' }}
                                            </div>
                                        </div>
                                        <div class="content" style="flex:1;">
                                            <div
                                                class="head d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                <div class="con">
                                                    <h5>
                                                        <a href="#">{{ $comment->name }}</a>
                                                        @if (!empty($comment->is_admin) && $comment->is_admin)
                                                            <span
                                                                class="ms-2 inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-semibold bg-primary text-white"
                                                                style="font-size:11px;">Admin</span>
                                                        @endif
                                                    </h5>
                                                    <span>{{ $comment->created_at->format('F d, Y \a\t H:i') }}</span>
                                                </div>

                                                @if (request()->cookie('comment_owner_token') && request()->cookie('comment_owner_token') === $comment->owner_token)
                                                    <div class="comment-actions d-flex align-items-center" style="gap:8px;">
                                                        <button type="button"
                                                            class="btn btn-sm btn-primary comment-edit-toggle px-2 py-1"
                                                            data-id="{{ $comment->id }}"
                                                            style="border-radius:6px; color:#fff;">Edit</button>
                                                        <form action="{{ route('comments.destroy', $comment) }}"
                                                            method="POST" style="display:inline; margin:0;"
                                                            class="comment-delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger px-2 py-1"
                                                                style="border-radius:6px; color:#fff;">Delete</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                            <p class="mt-30 mb-4 comment-body" id="comment-body-{{ $comment->id }}">
                                                {{ $comment->content }}
                                            </p>

                                            {{-- inline edit form (hidden) --}}
                                            @if (request()->cookie('comment_owner_token') && request()->cookie('comment_owner_token') === $comment->owner_token)
                                                <div class="comment-edit-form" id="comment-edit-{{ $comment->id }}"
                                                    style="display:none;">
                                                    <form action="{{ route('comments.update', $comment) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-2">
                                                            <input type="text" name="name"
                                                                class="form-control form-control-sm"
                                                                value="{{ $comment->name }}" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <textarea name="content" class="form-control" rows="4" required>{{ $comment->content }}</textarea>
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-sm btn-primary"
                                                                type="submit">Save</button>
                                                            <button type="button"
                                                                class="btn btn-sm btn-secondary comment-edit-cancel"
                                                                data-id="{{ $comment->id }}">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="comment-form-wrap pt-5">
                                <h3>Leave a comment</h3>
                                <form action="{{ route('comments.store', $post) }}" id="comment-post-form"
                                    method="POST">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="form-clt"><span>Your Name*</span>
                                                <input type="text" name="name" placeholder="Your Name"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-clt"><span>Your Email*</span>
                                                <input type="email" name="email" placeholder="Your Email"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-clt"><span>Message*</span>
                                                <textarea name="content" placeholder="Write Message" class="form-control" rows="6" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6"><button type="submit" class="theme-btn">Post comment<i
                                                    class="fa-solid fa-arrow-right-long"></i></button></div>
                                    </div>
                                </form>
                            </div>

                            {{-- Load external comment actions JS (handles edit toggles + SweetAlert2 delete) --}}
                            @push('scripts')
                                <script src="{{ asset('assets/js-user/comment-actions.js') }}"></script>
                            @endpush

                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="main-sideber">
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Search</h4>
                                </div>
                                <div class="search-widget">
                                    <form action="#"><input type="text" placeholder="Search here"><button
                                            type="submit"><i class="fa-solid fa-magnifying-glass"></i></button></form>
                                </div>
                            </div>

                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Categories</h4>
                                </div>
                                <div class="news-widget-categories">
                                    <ul>
                                        @if (isset($topCategories) && $topCategories->count())
                                            @foreach ($topCategories as $cat)
                                                <li>
                                                    <a
                                                        href="{{ route('landing.blog', ['category' => $cat->slug]) }}">{{ $cat->name }}</a>
                                                    <span>{{ $cat->posts_count }}</span>
                                                </li>
                                            @endforeach
                                        @else
                                            @php
                                                $topCategoriesFallback = \App\Models\Category::withCount([
                                                    'posts' => function ($q) {
                                                        $q->whereNotNull('published_at');
                                                    },
                                                ])
                                                    ->orderByDesc('posts_count')
                                                    ->take(3)
                                                    ->get();
                                            @endphp
                                            @foreach ($topCategoriesFallback as $cat)
                                                <li>
                                                    <a
                                                        href="{{ route('landing.blog', ['category' => $cat->slug]) }}">{{ $cat->name }}</a>
                                                    <span>{{ $cat->posts_count }}</span>
                                                </li>
                                            @endforeach
                                        @endif
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
                                        $recent = \App\Models\Post::published()
                                            ->latest('published_at')
                                            ->take(3)
                                            ->with('user')
                                            ->get();
                                    @endphp
                                    @foreach ($recent as $r)
                                        @php
                                            use Illuminate\Support\Str;

                                            $recentImg = $r->featured_image
                                                ? (Str::startsWith($r->featured_image, ['http://', 'https://'])
                                                    ? $r->featured_image
                                                    : asset('storage/' . ltrim($r->featured_image, '/')))
                                                : asset('assets/images-user/news/pp1.jpg');
                                        @endphp

                                        <div class="recent-items"
                                            style="display:flex; gap:10px; align-items:center; padding:1px 0;">
                                            <div class="recent-thumb"
                                                style="width:78px; height:78px; flex:0 0 78px; border-radius:10px; overflow:hidden; background:#e9e9e9;">
                                                <img src="{{ $recentImg }}" alt="img"
                                                    style="width:100%; height:100%; object-fit:cover; display:block;">
                                            </div>

                                            <div class="recent-content" style="flex:1;">
                                                <ul style="margin:0; padding:0; list-style:none;">
                                                    <li
                                                        style="display:flex; align-items:center; gap:8px; margin:0 0 4px 0;">
                                                        <i class="fa-regular fa-calendar"
                                                            style="color:#ff7a00; font-size:16px;"></i>
                                                        <span style="color:#15b6c8; font-weight:600; font-size:16px;">
                                                            {{ $r->published_at ? $r->published_at->format('d M, Y') : $r->created_at->format('d M, Y') }}
                                                        </span>
                                                    </li>
                                                </ul>
                                                <h6 style="margin:0; font-size:18px; line-height:1.2;">
                                                    <a href="{{ route('landing.blog.show', $r->slug) }}"
                                                        style="color:#0b2b2f;">
                                                        {{ $r->title }}
                                                    </a>
                                                </h6>
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
                                    <div class="tagcloud"><a href="#">Wisata</a><a href="#">Pariwisata</a><a
                                            href="#">Destinasi</a></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
