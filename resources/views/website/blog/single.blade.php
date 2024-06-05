@extends('layout.website')
@section('content')
    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1>Blog Destils</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post post-single">
                        <h2 class="post-title">{{ $blog ? $blog->title : '' }}</h2>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="ion-calendar"></i> {{ date('d M Y', strtotime($blog->created_at)) }}
                                </li>
                                <li>
                                    <i class="ion-android-people"></i> POSTED BY ADMIN
                                </li>


                            </ul>
                        </div>
                        <div class="post-thumb">
                            <img class="img-fluid " src="{{ URL::asset('uploads/blogs/' . $blog->image) }}" alt=""
                                style="width: 90%; margin: 0 auto;">
                        </div>
                        <div class="post-content post-excerpt">
                            <p>{{ $blog->description }}</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection