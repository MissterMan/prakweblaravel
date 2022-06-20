<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/sidebar.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar-css">
            <div class="navbar__content">
                <h2 class="navbar__brand">Beri<span class="span__color">.</span>ta 📰</h2>
                <ul class="navbar__list">
                    <a class="navbar__li" href="/">Home 🏠</a></li>
                    <a class="navbar__li" href="/profile">Profil 🧑</a></li>
                    <div class="navbar__dropdown">
                        <a id="toogleDrop" class="navbar__li" href="#">Kategori 📃</a>
                        <div id="dropdown-content" class="navbar__dropdown--content">
                            <a href="/categories/komputer" class="navbar__listdrop">Komputer & Teknologi</a>
                            <a href="" class="navbar__listdrop">Sejarah</a>
                            <a href="" class="navbar__listdrop">Seni & Desain</a>
                            <a href="" class="navbar__listdrop">Pendidikan</a>
                        </div>
                    </div>
                </ul>
                <!-- Hamburger -->
                <div class="hamburger">
                    <div class="hamburger__line" href=""></div>
                    <div class="hamburger__line" href=""></div>
                    <div class="hamburger__line" href=""></div>
                </div>
            </div>
            <!-- Mobile View -->
            <ul id="mobile__dropdown" class="navbar__list--mobile">
                <a class="navbar__li-mobile" href="#">Home 🏠</a></li>
                <a class="navbar__li-mobile" href="#">Profil 🧑</a></li>
                <div class="navbar__dropdown">
                    <a id="toogleDropMobile" class="navbar__li-mobile" href="#">Kategori 📃</a>
                    <div id="dropdownContentMobile" class="navbar__dropdown--content">
                        <a href="" class="navbar__listdrop">Komputer & Teknologi</a>
                        <a href="" class="navbar__listdrop">Sejarah</a>
                        <a href="" class="navbar__listdrop">Seni & Desain</a>
                        <a href="" class="navbar__listdrop">Pendidikan</a>
                        <a href="Calculator/index.html" class="navbar__listdrop">Kalkulator</a>
                        <a href="Movie/index.html" class="navbar__listdrop">Movie List</a>
                    </div>
                </div>
            </ul>
        </nav>
    </header>

    <h1 class="page__title">@yield('judul_halaman')</h1>

    <div class="master__content">
        @yield('konten')
        {{-- Sidebar --}}
        <div class="sidebar">
            <div class="sidebar__news">
                <div class="sidebar__content">
                    <form action="/">
                        <div class="row">
                            <div class="wrapper col-md-9">
                                <input id="search" class="sidebar__search form-control" name="search" type="text"
                                    placeholder="Search News..." autocomplete="off" value="{{ request('search') }}">
                            </div>
                            <button class="btn col-sm-2" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <h3 class="popular__news-text">Popular Beri<span class="span__color">.</span>ta 🔥</h3>
                <div class="sidebar__news-content">
                    <h3 class="popular__news-title">Popular News Title</h3>
                    <p class="popular__news-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus omnis maxime vero
                        aliquam
                        repudiandae! Qui veritatis corrupti vitae laudantium? Saepe?
                    </p>
                    <a class="popular__news-link" href="">Know More 👈</a>
                </div>
            </div>
        </div>
    </div>
    {{-- End Sidebar --}}

    <script src="{{ URL::asset('js/script.js') }}"></script>
</body>
<footer>

</footer>

</html>
