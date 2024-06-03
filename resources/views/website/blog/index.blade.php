@extends('layout.website')
@section('content')
    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1>Blog Right Sidebar</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>
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
                                <p>
                                <p>{{ Str::limit($it->description, 500) }} </p>
                                </p>
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
                                <div class="media">
                                    <a class="pull-left" href="blog-single.html">
                                        <img class="media-object"
                                            src="{{ asset('assets/website/images/blog/post-thumb.jpg') }}" alt="Image">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="blog-single.html">Introducing Swift for Mac</a>
                                        </h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, officia.</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <a class="pull-left" href="blog-single.html">
                                        <img class="media-object"
                                            src="{{ asset('assets/website/images/blog/post-thumb-2.jpg') }}" alt="Image">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="blog-single.html">Welcome to Themefisher
                                                Family</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, officia.</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <a class="pull-left" href="blog-single.html">
                                        <img class="media-object"
                                            src="{{ asset('assets/website/images/blog/post-thumb-2.jpg') }}" alt="Image">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="blog-single.html">Warm welcome from swift</a>
                                        </h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, officia.</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <a class="pull-left" href="blog-single.html">
                                        <img class="media-object"
                                            src="{{ asset('assets/website/images/blog/post-thumb-4.jpg') }}" alt="Image">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="blog-single.html">Introducing Swift for Mac</a>
                                        </h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, officia.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Latest Posts -->

                            <!-- Widget Category -->
                            <div class="widget widget-category">
                                <h4 class="widget-title">Categories</h4>
                                <ul class="widget-category-list">
                                    <li><a href="blog-grid.html">Animals</a>
                                    </li>
                                    <li><a href="blog-grid.html">Landscape</a>
                                    </li>
                                    <li><a href="blog-grid.html">Portrait</a>
                                    </li>
                                    <li><a href="blog-grid.html">Wild Life</a>
                                    </li>
                                    <li><a href="blog-grid.html">Video</a>
                                    </li>
                                </ul>
                            </div> <!-- End category  -->

                            <!-- Widget tag -->
                            <div class="widget widget-tag">
                                <h4 class="widget-title">Tag Cloud</h4>
                                <ul class="widget-tag-list">
                                    <li><a href="blog-grid.html">Animals</a>
                                    </li>
                                    <li><a href="blog-grid.html">Landscape</a>
                                    </li>
                                    <li><a href="blog-grid.html">Portrait</a>
                                    </li>
                                    <li><a href="blog-grid.html">Wild Life</a>
                                    </li>
                                    <li><a href="blog-grid.html">Video</a>
                                    </li>
                                </ul>
                            </div> <!-- End tag  -->
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
