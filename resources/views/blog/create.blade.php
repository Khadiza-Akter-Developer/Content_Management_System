@extends('layout.auth')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
    
        <div class="col-12 grid-margin stretch-card">
    
          <div class="card">
    
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('blog') }}" class="btn btn-gradient-dark btn-fw">Back</a>
                  </div>
    
              <h4 class="card-title">Create Blog</h4>
              <form class="forms-sample" action="{{ route('blog.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="" class="form-label">Title</label>
                  <input type="text" class="form-control" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" id="image" class="form-control" placeholder="Image" name="image">
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control" placeholder="Description" name="description">
                </div>
               
                <button type="submit" class="btn btn-gradient-dark btn-fw">Submit</button>
                <button class="btn btn-gradient-dark btn-fw">Cancel</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
    
@endsection
















{{-- @extends('layouts.sidenav')

@push('head')
    <title>Blog</title>
@endpush

@section('main-section')
<link rel="stylesheet" href="{{asset('CSS/Blog/blog_create.css')}}">

    <div class="container">
        @if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
    
@endif 
        <div class="container ">
            <div class="h2">Create Blog</div>
            <a href="{{ route('blog') }}" class="btn">Back</a> 
        </div>

           <div class="card">
            <div class="wrapper">
                <form action="{{ route('blog.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-title">
                        <label for="" class="form-label mt-4">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    
                    <div class="input-image">
                        <label for="image" class="form-label mt-4">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
    
                    <div class="input-description">
                        <label for="" class="form-label mt-4">Description</label>
                    <input type="text" name="description" class="form-control">
                    </div>
                    
    
                    <button type="submit" class="btn-save">Save</button>
                </form>
    
            </div>
           </div>
        </div>
@endsection --}}
