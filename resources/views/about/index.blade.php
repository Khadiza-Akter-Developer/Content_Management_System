@extends('layout.auth')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">List of About</h3>
        <div class="d-flex justify-content-end mb-3">
          <a href="{{ route('about.create') }}" class="btn btn-dark btn-lg btn-block me-2 btn-sm">Add About</a>
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
                            
                            <td><a href="{{ url('about-edit/'.$list->id) }}" class="btn btn-secondary btn-sm">Edit</a></td>
                            <td><a href="{{ url('about-delete/'.$list->id) }}" class="btn btn-sm bg-danger">Delete</a></td>
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
      <div class="row">
        {{ $about->links() }}
      </div>
    </div> 


    @endsection




