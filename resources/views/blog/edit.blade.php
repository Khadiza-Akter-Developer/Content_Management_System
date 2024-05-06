@extends('layouts.sidenav')

@push('head')
    <title>Blog</title>
@endpush

@section('main-section')
<link rel="stylesheet" href="{{asset('CSS/Blog/blog_edit.css')}}">

    <div class="container">
        @if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
    
@endif 
        <div class="container ">
            <div class="h2">Edit Blog</div>
            <a href="{{ route('blog') }}" class="btn">Back</a> 
        </div>

           <div class="wrapper">
                <form action="{{ url('blog-update', $blog->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-title">
                        <label for="" class="form-label mt-4">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                    </div>

                    <div class="input-image">
                        <label for="image" class="form-label mt-4">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <img src="{{ asset('uploads/blogs/'.$blog->image) }}" width="70px" height="70px" alt="Image"> 
                    <br>
                    </div>
                   
    
                   <div class="input-description">
                    <label for="" class="form-label mt-4">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $blog->description }}">
                   </div>
    
                    <button type="submit" class="btn-save" >update</button>
                </form>
    
            </div>
           </div>
        </div>
@endsection
