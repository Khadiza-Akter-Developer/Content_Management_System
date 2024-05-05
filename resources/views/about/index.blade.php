@extends('layouts.header')

@push('head')
    <title>About</title>
@endpush

@section('main-section')

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4"> 
            <div class="h2">All Abouts</div>
            <a href="{{ route('about.create') }}" class="btn btn-primary">Add About</a> 
        </div>

        <table class="table table-striped table-hover">
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
                        
                        <td><a href="{{ url('about-edit/'.$list->id) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ url('about-delete/'.$list->id) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>


@endsection

