@extends('layouts.sidenav')

@push('head')
    <title>Blog</title>
@endpush

@section('main-section')
<link rel="stylesheet" href="{{asset('CSS/Blog/blog.css')}}">
<div class="container my-4">
   
        <div class="container"> 
            <div class="h2">List of Blogs</div>
            <a href="{{ route('blog.create') }}" class="btn">Add Blog</a> 
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
                @foreach ($blog as $it)
                <tr>
                    <td>{{ $it->id }}</td>
                    <td>{{ $it->title }}</td>
                    <td><img src="{{ asset('uploads/blogs/'.$it->image) }}" width="70px" height="70px" alt="Image"></td>
                    <td>{{ $it->description }}</td> 
                    <td><a href="{{ url('blog-edit/'.$it->id) }}" class="btn-edit">Edit</a></td>
                    <td><a href="{{ url('blog-delete/'.$it->id) }}" class="btn-delete">Delete</a></td>

                </tr>
                @endforeach
                
            </tbody>
        </table>
        {{ $blog->links() }}
    </div>


@endsection

{{-- @include('layouts.footer') --}}

