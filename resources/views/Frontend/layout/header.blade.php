<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>St.Lawrence School of jewels</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset("/frontend/lib/animate/animate.min.css")}}" rel="stylesheet">
    <link href="{{asset("/frontend/lib/owlcarousel/assets/owl.carousel.min.css")}}" rel="stylesheet">
    <link href="{{asset('/')}}plugins/toastr/toastr.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("/frontend/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset("/frontend/css/style.css")}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.html" class="navbar-brand">
                <h1 class="m-0 text-primary"><img class="img-fluid" src="{{asset('storage/images/'.$institute->logo)}}" width="80px" alt="">{{ $institute->name }}</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    @foreach($menus as $menu)
                        @if($menu->hasSubmenus())
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ $menu->name }}</a>
                                <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                                    @foreach($submenu->where('menu_id', $menu->id) as $sub)
                                        <a href="{{ $sub->url }}" class="dropdown-item">{{ $sub->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ $menu->url }}" class="nav-item nav-link active">{{ $menu->name }}</a>
                        @endif
                    @endforeach

                </div>
            </div>
        </nav>
        <!-- Navbar End -->
