<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Airspace | Creative Agency Bootstrap Template</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Creative Agency Bootstrap Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="theme-name" content="airspace">
    <meta name="generator" content="Themefisher Airspace Template v1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />


    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('assets/website/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- Ionic Icon Css -->
    <link rel="stylesheet" href="{{ asset('assets/website/plugins/Ionicons/css/ionicons.min.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('assets/website/plugins/animate-css/animate.css') }}">
    <!-- Magnify Popup -->
    <link rel="stylesheet" href="{{ asset('assets/website/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('assets/website/plugins/slick/slick.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">

</head>

<body id="body">

    @include('layout.header')

    @yield('content')

    @include('layout.footer')

    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{ asset('assets/website/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('assets/website/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!-- slick Carousel -->
    <script src="{{ asset('assets/website/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/website/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!-- filter -->
    <script src="{{ asset('assets/website/plugins/shuffle/shuffle.min.js') }}"></script>
    <script src="{{ asset('assets/website/plugins/SyoTimer/jquery.syotimer.min.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places">
    </script>
    <script src="{{ asset('assets/website/plugins/google-map/map.js') }}"></script>

    <script src="{{ asset('assets/website/js/script.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-ynmr2Dd4D0VVN6Jd/ZMZaEW6uL9RtgNr/9+CfA/3YcZPUGkxjOX/3gEvdEzGL5tdMIr2ssDncBipIiJ/PJtn8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('scripts')

</body>

</html>
