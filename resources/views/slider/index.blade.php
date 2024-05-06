@extends('layouts.sidenav')

@push('head')
    <title>Slider</title>
@endpush

@section('main-section')
<link rel="stylesheet" href="{{asset('CSS/Slider/slider.css')}}">

    <div class="container my-4">
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
                @endforeach
                
            </tbody>
        </table>
        {{ $slider->links() }}
    </div>


@endsection

{{-- @include('layouts.footer') --}}

