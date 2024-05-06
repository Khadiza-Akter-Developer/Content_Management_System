<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('CSS/sidenav.css')}}">
    <script>src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'</script>
<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>

    </label>
    <div class="sidebar">
       
        <header>Content Management System</header>
        <ul>
            <li><a href="/" ><i class="fas fa-book-open"></i>Dashboard</a></li>
            <li><a href="{{ route('sliders') }}"><i class='fas fa-book-open'></i>Slider Page</a></li>
            <li><a href="{{ route('blog') }}"><i class='fas fa-book-open'></i>Blog Page</a></li>
            <li><a href="{{ route('about') }}"><i class='fas fa-book-open'></i>About Page</a></li>
        </ul>
    </div>
    <section>

        @yield('main-section')
    </section>
</body>
</html> 
