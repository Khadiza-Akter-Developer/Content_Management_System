@extends('layout.auth')
@section('content')

 <!-- partial -->
 {{-- <div class="container mt-4 mb-8">
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a href="{{ route('slider.create') }}" class="btn btn-primary me-md-2 $btn-padding-y:50">Add Slider</a> 
    </div> --}}

 <div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">List of Slider </h3>
      <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('slider.create') }}" class="btn btn-dark btn-lg btn-block me-2 btn-sm">Add Slider</a>
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
                @foreach ($slider as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ asset('uploads/sliders/'.$item->image) }}" width="70px" height="70px" alt="Image"></td>
                    <td>{{ $item->description }}</td> 
                    <td><a href="{{ url('slider-edit/'.$item->id) }}" class="btn btn-secondary btn-sm">Edit</a></td>
                    <td><a href="{{ url('slider-delete/'.$item->id) }}" class="btn bg-danger btn-sm">Delete</a></td>

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
@endsection








{{-- @extends('layouts.app')

@push('head')
    <title>Slider</title>
@endpush

@section('content')
<link rel="stylesheet" href="{{asset('CSS/Slider/slider.css')}}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<div class="container mt-4 mb-8">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('slider.create') }}" class="btn btn-primary me-md-2 $btn-padding-y:50">Add Slider</a> 
      </div>

    <div class="row justify-content-center">
      <div class="col-md-9"> 
        <div class="card">

          <div class="card-header">
            <h3 class="card-title">List of Sliders</h3>
  
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
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
                @foreach ($slider as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ asset('uploads/sliders/'.$item->image) }}" width="70px" height="70px" alt="Image"></td>
                    <td>{{ $item->description }}</td> 
                    <td><a href="{{ url('slider-edit/'.$item->id) }}" class="btn btn-info">Edit</a></td>
                    <td><a href="{{ url('slider-delete/'.$item->id) }}" class="btn btn-danger">Delete</a></td>

                </tr>
                @endforeach 
                
            </tbody>
        </div>
    </div>
</div>




    {{-- <div class="container my-4">
        <div class="container"> 
            <div class="h2">All Sliders</div>
            <a href="{{ route('slider.create') }}" class="btn">Add Slider</a> 
        </div>

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
                @foreach ($slider as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ asset('uploads/sliders/'.$item->image) }}" width="70px" height="70px" alt="Image"></td>
                    <td>{{ $item->description }}</td> 
                    <td><a href="{{ url('slider-edit/'.$item->id) }}" class="btn-edit">Edit</a></td>
                    <td><a href="{{ url('slider-delete/'.$item->id) }}" class="btn-delete">Delete</a></td>

                </tr>
                @endforeach --}}
                
            {{-- </tbody> --}}
        {{-- </table>
        {{ $slider->links() }}
    </div>

    @if(Session::has('message'))
    <script>
        swal('Message', "{{ Session::get('message') }}", 'success', {
            button:true,
            button:'OK',

        })
    </script>
        
    @endif
@endsection --}}

{{-- @include('layouts.footer') --}}

