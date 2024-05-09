@extends('layout.auth')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
    
        <div class="col-12 grid-margin stretch-card">
    
          <div class="card">
    
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('about') }}" class="btn btn-dark me-2 btn-sm">Back</a>
                  </div>
    
              <h4 class="card-title">Update About</h4>
              <form class="forms-sample" action="{{ url('about-update', $about->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="" class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" value="{{ $about->title }}">
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" id="image" class="form-control"  name="image">
                  <br>
                  <img src="{{ asset('uploads/abouts/'.$about->image) }}" width="70px" height="70px" alt="Image"> 
                  <br>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control"  name="description" value="{{ $about->description }}">
                </div>
               
                <button type="submit" class="btn btn-dark btn-md btn-block btn-sm">Update</button>
                <button class="btn btn-dark btn-sm">Cancel</button>
              </form>
            </div>
          </div>
        </div>
    </div>
        </div>
@endsection





















{{-- @extends('layouts.sidenav')

@push('head')
    <title>About</title>
@endpush

@section('main-section')
<link rel="stylesheet" href="{{asset('CSS/About/about_edit.css')}}">


    <div class="container">
        @if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
    
@endif 


        <div class="container">
            <div class="h2">Edit About</div>
            <a href="{{ route('about') }}" class="btn">Back</a>
        </div>

        

           <div class="wrapper">
                <form action="{{ url('about-update', $about->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="input-title">
                        <label for="" class="form-label mt-4">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $about->title }}">
                    </div>

                    <div class="input-image">
                        <label for="image" class="form-label mt-4">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <img src="{{ asset('uploads/abouts/'.$about->image) }}" width="70px" height="70px" alt="Image"> 
                    <br> 
                    </div>                   
    
                    <div class="input-description">
                        <label for="" class="form-label mt-4">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $about->description }}">
                    </div>
                    
    
                    <button type="submit" class="btn-save" >update</button>
                </form>
    
            </div>
           </div>
        </div>
@endsection --}}
