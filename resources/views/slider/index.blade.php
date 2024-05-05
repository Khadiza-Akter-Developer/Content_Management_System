@extends('layouts.header')

@push('head')
    <title>Slider</title>
@endpush

@section('main-section')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3"> 
            <div class="h2">All Sliders</div>
            <a href="{{ route('slider.create') }}" class="btn btn-primary">Add Slider</a> 
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
                @foreach ($slider as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ asset('uploads/sliders/'.$item->image) }}" width="70px" height="70px" alt="Image"></td>
                    <td>{{ $item->description }}</td> 
                    <td><a href="{{ url('slider-edit/'.$item->id) }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{ url('slider-delete/'.$item->id) }}" class="btn btn-danger">Delete</a></td>

                </tr>
                @endforeach
                
            </tbody>
        </table>
        {{ $slider->links() }}
    </div>


@endsection

{{-- @include('layouts.footer') --}}

