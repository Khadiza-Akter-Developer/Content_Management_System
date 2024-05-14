@extends('layout.auth')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
    
        <div class="col-12 grid-margin stretch-card">
    
          <div class="card">
     
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('about') }}" class="btn btn-gradient-dark btn-sm">Back</a>
                  </div>
    
              <h4 class="card-title">Create About</h4>

             
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

              <form class="forms-sample" action="{{ route('about.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="" class="form-label">Title</label>
                  <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title') }}">
                </div>
                
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" id="image" class="form-control" placeholder="Image" name="image" value="{{ old('image') }}">
                </div>

                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control" placeholder="Description" name="description" value="{{ old('description') }}">
                </div>
               
                <button type="submit" class="btn btn-gradient-dark btn-sm">Submit</button>
                <button class="btn btn-gradient-dark btn-sm">Cancel</button>
              </form>
            </div>
          </div>
        </div>
    </div>
        </div>    
@endsection