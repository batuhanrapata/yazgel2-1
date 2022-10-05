<!DOCTYPE html>
<html>

<head>
    <title>Danışman Girişi</title>
    <link rel="stylesheet" href="{{asset('front/')}}/css/bootstrap.css">
</head>

<body class=" bg-light d-flex flex-column min-vh-100 ">
    <div class="container mt-3 pt-5 w-100 text-break">
        <h1 class="display-6 text-center mt-3 ">
            <img class="mt-1 " style="width: 170px; height: 120px;" src="{{asset('front/')}}/img/Kocaeli_universitesi.png"> KOCAELİ ÜNİVERSİTESİ PROJE TAKİP SİSTEMİ</h1>
        <div class="mt-1 pt-4 ">
            <div class=" shadow col text-center mx-auto w-25 pt-4 mt-1 ">
                <form action="# " method="POST " role="form ">
                    <legend class="mb-3 ">Danışman Girişi</legend>
                    <div class="form-group ">
                        <input id="dansimanGirisNo" type="text " class="shadow-sm mx-auto w-50 form-control my-1 " placeholder="Danışman Numaranız ">
                        <input id="dansimanGirisSifre" type="password " class="shadow-sm mx-auto w-50 form-control my-2 " placeholder="Şifreniz ">
                    </div>
                    <div>
                        <a href="#" class="text-end text-decoration-none text-sm-end text-success"> Şifremi Unuttum </a>
                    </div>
                    <button id="danismanGirisButon" type="submit " class="shadow-sm btn-outline-success btn my-3 ">Giriş</button>
                </form>
            </div>
            <div class="bg-light shadow col text-center mx-auto w-25 pt-1 mt-5 pe-3">
                <button id="danismanGirisOgrenciButon" class="shadow-sm btn-outline-success btn my-2 mx-2">Öğrenci Girişi</button>
                <button id="danismanGirisYoneticiButon" class="shadow-sm btn-outline-success btn my-2 mx-2">Yönetici Girişi</button>
            </div>
        </div>
    </div>
    </div>
    </div>
    @include('layout.footer')
</body>

</html>