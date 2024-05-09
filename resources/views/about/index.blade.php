@extends('layout.auth')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">List of About</h3>
        <div class="d-flex justify-content-end mb-3">
          <a href="{{ route('about.create') }}" class="btn btn-dark btn-lg btn-block me-2">Add About</a>
        </div>
      </div>
     
      <div class="row">
        <div class="col-lg-14 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
  
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th> ID </th>
                    <th> Title </th>
                    <th> Image </th>
                    <th> Description </th>
                    <th> Edit </th>
                    <th> Delete </th>
  
                  </tr>
                </thead>

                <tbody>
                    @foreach ($about as $list)
                    <tr>
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->title }}</td>
                            <td><img src="{{ asset('uploads/abouts/'.$list->image) }}" width="70px" height="70px" alt="Image"></td> 
                            <td>{{ $list->description }}</td> 
                            
                            <td><a href="{{ url('about-edit/'.$list->id) }}" class="btn btn-secondary btn-fw">Edit</a></td>
                            <td><a href="{{ url('about-delete/'.$list->id) }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        
                    </tr>
                    @endforeach
                    
                </tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> 

    <div class="row">
      {{ $about->links() }}
    </div>
    @endsection









{{-- @extends('layouts.sidenav')

@push('head')
    <title>About</title>
@endpush

@section('main-section')
<link rel="stylesheet" href="{{asset('CSS/About/about.css')}}">


    <div class="container">
            <div class="h2">List of Abouts</div>
            <a href="{{ route('about.create') }}" class="btn btn-primary">Add About</a> 
    </div>
    <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($about as $list)
                <tr>
                    <tr>
                        <td>{{ $list->id }}</td>
                        <td>{{ $list->title }}</td>
                        <td><img src="{{ asset('uploads/abouts/'.$list->image) }}" width="70px" height="70px" alt="Image"></td> 
                        <td>{{ $list->description }}</td> 
                        
                        <td><a href="{{ url('about-edit/'.$list->id) }}" class="btn-edit">Edit</a></td>
                        <td><a href="{{ url('about-delete/'.$list->id) }}" class="btn-delete">Delete</a></td>
                    </tr>
                    
                </tr>
                @endforeach
                
            </tbody>
        </table>

        <div class="row">
            {{ $about->links() }}
        </div>



@endsection
 --}}
