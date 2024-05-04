@extends('layouts.header')

@push('head')
    <title>About</title>
@endpush

@section('main-section')


    <div class="container">
        @if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
    
@endif 
        <div class="d-flex justify-content-between align-items-center my-5 ">
            <div class="h2">Create About</div>
            <a href="{{ route('about') }}" class="btn btn-primary">Back</a> 
        </div>

           <div class="card">
            <div class="card-body">
                <form action="{{ route('about.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="" class="form-label mt-4">Title</label>
                    <input type="text" name="title" class="form-control">
                
    
                    <label for="image" class="form-label mt-4">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    
    
                    <label for="" class="form-label mt-4">Description</label>
                    <input type="text" name="description" class="form-control">
    
                    <button class="btn btn-primary mt-4">Save</button>
                </form>
    
            </div>
           </div>
        </div>
@endsection
