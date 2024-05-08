<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Content Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <link rel="stylesheet" href="{{asset('CSS/navbar.css')}}">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>Content Management System</h2>
            <ul>
                <li><a href="#" class="active" ><i class="bi bi-house"></i>Dashboard</a></li>
                <li><a href="{{ route('sliders') }}"><i class="bi bi-body-text"></i>Slider Page</a></li>
                <li><a href="#" ><i class="bi bi-file-earmark-person"></i>About Page</a></li>
                <li><a href="#" ><i class="bi bi-substack"></i>Blog Page</a></li>

            </ul>

            <div class="social-media">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
            </div>
        </div>

        <div class="main_content">
            <header>
            <h2>
               Explore More
            </h2>
            <div class="search-wrapper">
                <input type="search" placeholder="Search here"/>
                <i class="bi bi-search"></i>
            </div>

            </header>
        </div>
    </div>
</body>
</html>