@extends('layouts.header')

@push('head')
    <title>Slider</title>
@endpush

@section('main-section')


    <div class="container">
        @if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
    
@endif 
        <div class="d-flex justify-content-between align-items-center my-5 ">
            <div class="h2">Edit Slider</div>
            <a href="{{ route('sliders') }}" class="btn btn-primary">Back</a> 
        </div>

           <div class="card">
            <div class="card-body">
                <form action="{{ url('slider-update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <label for="" class="form-label mt-4">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                
    
                    <label for="image" class="form-label mt-4">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <img src="{{ asset('uploads/sliders/'.$slider->image) }}" width="70px" height="70px" alt="Image"> 
                    
    
                    <label for="" class="form-label mt-4">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $slider->description }}">
    
                    <button type="submit" class="btn btn-primary mt-4" >update</button>
                </form>
    
            </div>
           </div>
        </div>
@endsection
