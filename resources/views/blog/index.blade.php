@extends('layouts.header')

@push('head')
    <title>Blog</title>
@endpush

@section('main-section')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3"> 
            <div class="h2">All Blogs</div>
            <a href="{{ route('blog.create') }}" class="btn btn-primary">Add Blog</a> 
        </div>

        <table class="table table-bordered table-striped">
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
                @foreach ($blog as $items)
                <tr>
                    <tr>
                        <td>{{ $items->id }}</td>
                        <td>{{ $items->title }}</td>
                        <td><img src="{{ asset('uploads/blogs/'.$items->image) }}" width="70px" height="70px" alt="Image"></td> 
                        <td>{{ $items->description }}</td> 
                        <td><a href="{{ url('blog-edit/'.$items->id) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ url('blog-delete/'.$items->id) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    

                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>


@endsection

