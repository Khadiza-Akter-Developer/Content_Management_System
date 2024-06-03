@extends('layout.website')
@section('content')
    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1>All Blogs</h1>
                        <p>All of the content you require is available here.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach ($blog as $it)
                        <div class="post">
                            <div class="post-media post-thumb">
                                <a href="blog-single.html">
                                    <img src="{{ URL::asset('uploads/blogs/' . $it->image) }}" style="width: 70%">
                                </a>
                            </div>
                            <h3 class="post-title"><a href="#">{{ $it->title }}</a></h3>
                            <div class="post-meta">
                                <ul>
                                    <li>
                                        <i class="ion-calendar"></i> {{ date('d M Y', strtotime($it->created_at)) }}
                                    </li>
                                    <li>
                                        <i class="ion-android-people"></i> POSTED BY ADMIN
                                    </li>
                                </ul>
                            </div>
                            <div class="post-content">
                                <p>{{ Str::limit($it->description, 500) }}</p>
                                <a href="{{ route('blogs.show', $it->id) }}" class="btn btn-main">Continue Reading</a>
                            </div>
                        </div>
                    @endforeach

                    {{ $blog->links() }}
                </div>

                <div class="col-lg-4">
                    <div class="pl-0 pl-xl-4">
                        <aside class="sidebar pt-5 pt-lg-0 mt-5 mt-lg-0">
                            <!-- Widget Latest Posts -->
                            <div class="widget widget-latest-post">
                                <h4 class="widget-title">Latest Posts</h4>
                                
                                @if (count($latestBlogs) > 0)
                                    @foreach ($latestBlogs as $latestBlog)
                                        <div class="media">
                                            <a class="pull-left" href="blog-single.html">
                                                <img class="media-object"
                                                    src="{{ URL::asset('uploads/blogs/' . $latestBlog->image) }}"
                                                    alt="Image">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a
                                                        href="{{ route('blogs.show', $latestBlog->id) }}">{{ $latestBlog->title }}</a>
                                                </h4>
                                                <p>{{ Str::limit($latestBlog->description, 35) }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h6 class="text-center text-danger">No post yet</h6>
                                @endif
                            </div>
                            <!-- End Latest Posts -->

                            <!-- Other sidebar widgets -->
                            <!-- ... -->
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
