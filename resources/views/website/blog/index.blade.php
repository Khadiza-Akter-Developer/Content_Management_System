@extends('layout.master')
@section('content')
    {{-- slider start --}}
    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            @foreach ($slider as $index => $item)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img class="d-block w-100 fixed-height" src="{{ URL::asset('uploads/sliders/' . $item->image) }}"
                        alt="">
                </div>
            @endforeach
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
        <ol class="carousel-indicators">
            @foreach ($slider as $index => $item)
                <li data-target="#carousel-thumb" data-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}"> <img class="d-block w-100"
                        src="{{ URL::asset('uploads/sliders/' . $item->image) }}" class="img-fluid"></li>
            @endforeach
        </ol>
    </div>

    {{-- Slider end --}}

    <section class="about section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="block">
                        <div class="section-title">
                            <h2>About Us</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the
                                blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit
                            anim id </p>
                    </div>
                </div><!-- .col-md-7 close -->
                <div class="col-md-5">
                    <div class="block">
                        <img src="{{ asset('assets/website/images/wrapper-img.png') }}" alt="Img">
                    </div>
                </div><!-- .col-md-5 close -->
            </div>
        </div>
    </section>

    <section class="feature bg-2">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <h2 class="section-subtitle">WE BELIEVE IN GREAT IDEAS</h2>
                    <p>Maecenas faucibus mollis interdum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                        Fusce
                        dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet
                        risus.
                    </p>
                    <p>Maecenas faucibus mollis interdum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                        Fusce
                        dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet
                        risus.
                    </p>
                    <p>Maecenas faucibus mollis interdum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                        Fusce
                        dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet
                        risus.
                    </p>
                    <a href="portfolio.html" class="btn btn-view-works">View Works</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Start -->
    <section class="service">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2>Our Blogs</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, <br>
                            there live the
                            blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blog as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="service-item">
                            <a class="icon" href="{{ route('blogs.show', ['blog' => $item->id]) }}">
                                <img class="fixed-size-img" src="{{ URL::asset('uploads/blogs/' . $item->image) }}">
                                <h4>{{ $item->title }}</h4>
                                <p>{{ Str::limit($item->description, 50) }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <section class="call-to-action bg-1 section-sm overly">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2 class="mb-3">We design delightful digital experiences.</h2>
                        <p>Read more about what we do and our philosophy of design. Judge for yourself The work and results <br> we’ve
                            achieved for other clients, and meet our highly experienced Team who just love to design.</p>
                        <a class="btn btn-main btn-solid-border" href="contact.html">Tell Us Your Story</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
