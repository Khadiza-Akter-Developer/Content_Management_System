@extends('layouts.sidenav')

@push('head')
    <title>Slider</title>
@endpush

@section('main-section')
<link rel="stylesheet" href="{{asset('CSS/Slider/slider_create.css')}}">


    <div class="container">
        @if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
    
@endif 
        <div class="container">
            <div class="h2">Create Slider</div>
            <a href="{{ route('sliders') }}" class="btn">Back</a> 
        </div>

           <div class="wrapper">
                <form action="{{ route('slider.store')}}" method="POST" enctype="multipart/form-data">
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
                    
                    <div class="btn-save">
                        <button type="submit">Save</button>
                    </div>

                </form>
    
            </div>
           </div>
        </div>
@endsection
