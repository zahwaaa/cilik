<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link href="{{ asset('template') }}/asset/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700;800&family=Overpass:wght@400;700&&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>CILIK | {{ $title ?? "" }}</title>
    <link rel="icon" href="{{ asset('template') }}/gbr/logo.jfif">
</head>

<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light shadow p-3 mb-5" align="center">
        <a class="navbar-brand text-dark nav-custom ml-2" href="/">CILIK</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto">
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-custom" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Apa Ini?
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="tentangkami.php">Tentang Kami</a>
                        <a class="dropdown-item" href="#">Aturan Main</a>
                    </div>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-custom" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($article_cats as $article_cat)
                        <a class="dropdown-item" href="{{ route('homepage.articlecategory', $article_cat->slug) }}">{{ $article_cat->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link disabled nav-custom" href="#" tabindex="-1" aria-disabled="true">Hubungi Kami</a>
                </li>
                <form class="form-inline my-2 my-lg-0" action="{{ route('homepage.cari') }}" method="post"> @csrf
                    <!-- <span class="fa fa-lg fa-search mt-3"></span><input class="form-control mr-sm-2 search-custom" type="search" placeholder="Cari..."> -->

                    <div class="input-group col-md-12">
                        <input class="form-control py-2 border-right-0 border" type="text" placeholder="Cari..." id="example-search-input" style="border-radius: 30px; background-color: #eee;" name="cari">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary border-left-0 border" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                @auth

                <li class="nav-item active nav-custom">
                    <a class="nav-link text-dark" href="{{ route('homepage.competitions') }}">Kompetisi</a>
                </li>
                <li class="nav-item active nav-custom">
                    <a class="nav-link text-dark" href="{{ route('article_member.index') }}">Kirim Karya</a>
                </li>
                <li class="nav-item active nav-custom">
                    <a class="nav-link text-dark" href="{{ route('shop.daftar') }}">Pembayaran</a>
                </li>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active nav-custom">
                        <a class="nav-link text-dark reg-btn-custom ml-2 pl-3 pr-3" href="{{ route('keluar') }}">Keluar</a>
                    </li>
                </ul>
                @else
                <li class="nav-item active nav-custom">
                    <a class="nav-link text-dark" href="{{ route('login') }}">Masuk</a>
                </li>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active nav-custom">
                        <a class="nav-link text-dark reg-btn-custom ml-2 pl-3 pr-3" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
                @endauth
            </ul>
        </div>
    </nav>

    @yield('content')



    <!-- JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

</body>

</html>
