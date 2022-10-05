<!DOCTYPE html>
<html>

<head>
    <title>Danışman Anasayfa</title>
    <link rel="stylesheet" href="{{asset('front/')}}/css/bootstrap.css">
</head>

<body class="bg-light bg-light d-flex flex-column min-vh-100">
    <script src="{{asset('front/')}}/js/bootstrap.bundle.js"></script>
    <div class="container">


<nav class="navbar navbar-expand-xl navbar-dark bg-success shadow-sm rounded-bottom">
    <div class="container">
        <div class="col">
            <p class="display-6 text-sm link-light">Kocaeli Üniversitesi Proje Takip Sistemi <span class="mb-5" style="font-size: 20px; color: rgba(212, 255, 217, 0.802);">- {{ isset($top->ad) ? $top->ad : '' }} {{ isset($top->soyad) ? $top->soyad : '' }} </span> </p>
            <div class="">
                <p id="navbarDanismanDonemBilgisi" class=" text-sm mt-3" style="color: rgba(212, 255, 217, 0.802);" id="navbarDonemBilgisi">{{ isset($top->getSemester->donem) ? $top->getSemester->donem : '' }}</p>
            </div>
        </div>
        <div class="mt-5 pt-2">
            <ul class="navbar-nav  pb-sm-1 ">
                <li class="nav-item">
                    <a id="navbarDanismanBasvurular" class="nav-link" href="danisman-anasayfa">Gelen Proje Başvuruları</a>
                </li>
                <li class="nav-item ">
                    <a id="navbarDanismanOgrencilerim" class="nav-link " href="danisman-ogrenciler">Öğrencilerim</a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="nav-link">Çıkış</a>
                                <form action="{{ route('admin.logout') }}" id="logout-form" method="post">
                                    @csrf
                                </form>
                </li>
            </ul>
        </div>
    </div>
</nav>