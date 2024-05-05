
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
            <a class="navbar-brand ms-2" href="/">Home</a> 
            <a class="navbar-brand ms-2" href="{{ route('sliders') }}">Slider</a>
            
            <a class="navbar-brand" href="{{ route('about') }}">About</a>
            <a class="navbar-brand ms-3" href="{{ route('blog') }}">Blog</a> 
        </div>
    </nav>

      
   {{-- <div class="header">
    <div class="top_header">
        <div class="icon">

        </div>
        <div class="info"><p>Content Management System</p></div>

        <div class="nav">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="{{ route('sliders') }}">Slider</a></li>
                <li><a href="">Blog</a></li>

            </ul>
        </div>
    </div>
   </div> --}}

   @yield('main-section')
</body>
</html>