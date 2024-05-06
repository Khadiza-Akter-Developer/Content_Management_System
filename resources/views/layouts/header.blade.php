
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('head')

  <link rel="stylesheet" href="{{ asset('../CSS/header.css') }}">
</head>
<body>
    <div class="container">
        <p>Read and Search anything you want</p>
    </div>

    

   @yield('main-section')
</body>
</html>