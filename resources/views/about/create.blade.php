@extends('layouts.sidenav')

@push('head')
    <title>About</title>
@endpush

@section('main-section')
<link rel="stylesheet" href="{{asset('CSS/About/about_create.css')}}">


    <div class="container">
        @if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
    
@endif 
        <div class="container">
            <div class="h2">Create About</div>
            <a href="{{ route('about') }}" class="btn">Back</a> 
        </div>

        <div class="wrapper">
                <form action="{{ route('about.store')}}" method="POST" enctype="multipart/form-data">
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
    
                   
                    <button type="submit" class="btn btn-primary mt-4">Save</button>
                </form>
    
            </div>
           </div>
        </div>
@endsection
