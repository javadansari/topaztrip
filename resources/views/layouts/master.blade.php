<!DOCTYPE html>
<html lang="en">

<head>
    @section('head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Blog Home - Start Bootstrap Template</title>

        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap-rtl-min.css" rel="stylesheet">
        <!-- Custom styles for this template -->

        @yield('style')
        <link href="/css/blog-home.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
    @show
</head>

<body>

<!-- Navigation -->
@include('layouts.header')
@include('components.slider')
@include('components.search')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">
            @yield('content')
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-2">
            @section('sidebar')
                {{--@include('layouts.sidebar')--}}
            @show
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
@include('layouts.footer')

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/vendor/bootstrap/js/chart.min.js"></script>
@yield('script')
</body>

</html>
