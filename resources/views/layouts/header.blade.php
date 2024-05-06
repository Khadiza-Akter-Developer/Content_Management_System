
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="{{ asset('resources/css/styles.css') }}"> --}}
</head>
<body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <h2>Content Management System</h2>
            <a class="navbar-brand s-1" href="/">Home</a> 
            <a class="navbar-brand s-4" href="{{ route('sliders') }}">Slider</a>
            <a class="navbar-brand s-4" href="{{ route('about') }}">About</a>
            <a class="navbar-brand s-3" href="{{ route('blog') }}">Blog</a> 
        </div>
    </nav>

    

   @yield('main-section')
</body>
</html>