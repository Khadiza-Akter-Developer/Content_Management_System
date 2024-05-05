@extends('layouts.header')

@push('head')
    <title>Blog</title>
@endpush

@section('main-section')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3"> 
            <div class="h2">List of Blogs</div>
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
                @foreach ($blog as $it)
                <tr>
                    <td>{{ $it->id }}</td>
                    <td>{{ $it->title }}</td>
                    <td><img src="{{ asset('uploads/blogs/'.$it->image) }}" width="70px" height="70px" alt="Image"></td>
                    <td>{{ $it->description }}</td> 
                    <td><a href="{{ url('blog-edit/'.$it->id) }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{ url('blog-delete/'.$it->id) }}" class="btn btn-danger">Delete</a></td>

                </tr>
                @endforeach
                
            </tbody>
        </table>
        {{ $blog->links() }}
    </div>


@endsection

{{-- @include('layouts.footer') --}}

