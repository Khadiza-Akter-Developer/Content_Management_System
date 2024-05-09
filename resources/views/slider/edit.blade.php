@extends('layout.auth')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
    
        <div class="col-12 grid-margin stretch-card">
    
          <div class="card">
    
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('sliders') }}" class="btn btn-dark me-2">Back</a>
                  </div>
    
              <h4 class="card-title">Update Slider</h4>
              <form class="forms-sample" action="{{ url('slider-update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="" class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" id="image" class="form-control"  name="image">
                  <img src="{{ asset('uploads/sliders/'.$slider->image) }}" width="70px" height="70px" alt="Image"> 
                  <br>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control"  name="description" value="{{ $slider->description }}">
                </div>
               
                <button type="submit" class="btn btn-dark btn-md btn-block">Update</button>
                <button class="btn btn-dark">Cancel</button>
              </form>
            </div>
          </div>
        </div>
    </div>
        </div>
@endsection




























{{-- @extends('layouts.sidenav')

@push('head')
    <title>Slider</title>
@endpush

@section('main-section')
<link rel="stylesheet" href="{{asset('CSS/Slider/slider_edit.css')}}">


    <div class="container">
        @if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
    
@endif 
        <div class="container">
            <div class="h2">Edit Slider</div>
            <a href="{{ route('sliders') }}" class="btn">Back</a> 
        </div>


            <div class="wrapper">
                <form action="{{ url('slider-update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-title">
                        <label for="" class="form-label mt-4">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                    </div>

                    <div class="input-image">
                        <label for="image" class="form-label mt-4">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <img src="{{ asset('uploads/sliders/'.$slider->image) }}" width="70px" height="70px" alt="Image"> 
                        <br>
                    </div>
                    
                    <div class="input-description">
                        <label for="" class="form-label mt-4">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $slider->description }}">
                    </div>
                    
    
                    <button type="submit" class="btn-save" >update</button>
                </form>
    
            </div>
           </div>
        </div>
@endsection --}}
