@extends('layouts.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @push('head')
    <title>CMS</title>
@endpush
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @section('main-section')
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">CMS</h2>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
