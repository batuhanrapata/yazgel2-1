@extends('layout.yonetici-master')
@section('content')
    
<br><br>
@if(Session("status"))
<div class="alert alert-success">
   <p>{{ Session("status") }}</p>
</div>
@endif

        <!--DANIŞMAN EKLEME KISMININ KONTEYNIRI-->
        <div class="pt-2 my-5">
            <div class="row d-flex justify-content-center pt-5 rounded rounded-lg">

                <button class="btn-outline-success btn-lg mt-5" data-bs-toggle="modal" data-bs-target="#ogrenciEkle">Öğrenci Ekle</button>
                <button class="btn-outline-success btn-lg mt-5" data-bs-toggle="modal" data-bs-target="#danismanEkle">Danışman Ekle</button>
                <button class="btn-outline-success btn-lg mt-5" data-bs-toggle="modal" data-bs-target="#donemEkle">Dönem Ekle</button>

            </div>
        </div>



        <!--ÖĞRENCİ EKLEMEK İÇİN POP-UP MENÜ  -->
        <div class="modal fade" id="ogrenciEkle" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success" id="exampleModalLabel">Öğrenci Ekle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{url('add-student')}}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                    <div class="modal-body">
                            <div class="form-group">
                                <input type="file" class="shadow-sm mx-auto w-50 form-control my-2" id="ogrenciEkleFoto" accept="image/png, image/jpeg"name="fotograf">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="ogrenciEkleAd" placeholder="Adı" name="ad">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="ogrenciEkleSoyad" placeholder="Soyadı" name="soyad">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="ogrenciEkleFakulte" placeholder="Fakülte" name="fakulte">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="ogrenciEkleBolum" placeholder="Bölüm" name="bolum">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="ogrenciEkleSınıf" placeholder="Sınıf" name="sinif">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="ogrenciEkleMail" placeholder="Mail Adresi" name="email">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="ogrenciEkleTelNo" placeholder="Telefon Numarası" name="telefon">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="ogrenciEkleOgrNo" placeholder="Öğrenci Numarası" name="numarasi">
                                <br>
                                <select id="ogrenciEkleDanismanSecimi" name="consultant_id" class="form-select form-select-md shadow-sm mx-auto w-75 form-control mt-2">
                                    <option selected>Öğrencinin Ekleneceği Danışman</option>
                                    @foreach ($consultants as $consultant)
                                        <option  value="{{$consultant->id}}">{{$consultant->ad}} {{$consultant->soyad}}</option>
                                    @endforeach
                                </select>
                                <select id="ogrenciEkleDonemSecimi" name="semester_id" class="form-select form-select-md shadow-sm mx-auto w-75 form-control mt-2">
                                    <option selected>Öğrencinin Ekleneceği Dönem</option>
                                    @foreach ($semesters as $semester)
                                    <option value="{{$semester->id}}">{{$semester->donem}}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn shadow-sm btn-outline-success" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" id="ogrenciEkleBitir" class="btn shadow-sm btn-outline-success">Öğrenciyi Ekle</button>
                    </div>
                </form>

                </div>
            </div>
        </div>

        <!--DANIŞMAN EKLEMEK İÇİN POP-UP MENÜ-->
        <div class="modal fade" id="danismanEkle" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success" id="exampleModalLabel">Danışman Ekle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{url('add-consultant')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <input type="file" class="shadow-sm mx-auto w-50 form-control my-2" id="danismanEkleFoto" accept="image/png, image/jpeg" name="fotograf">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="danismanEkleAd" placeholder="Adı" name="ad">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="danismanEkleSoyad" placeholder="Soyadı" name="soyad">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="danismanEkleFakulte" placeholder="Fakülte" name="fakulte">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="danismanEkleBolum" placeholder="Bölüm" name="bolum">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="danismanEkleUnvan" placeholder="Ünvan" name="unvan">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="danismanEkleMail" placeholder="Mail Adresi" name="email">
                                <input type="text" class="shadow-sm mx-auto w-50 form-control my-2" id="danismanEkleTelNo" placeholder="Telefon Numarası" name="telefon">
                                <br>
                                <br>
                                <select id="danismanEkleDonemSecimi" name="semester_id" class="form-select form-select-md shadow-sm mx-auto w-75 form-control mt-2">
                                    @foreach ($semesters as $semester)
                                    <option value="{{$semester->id}}">{{$semester->donem}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn shadow-sm btn-outline-success" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" id="danismanEkleBitir" class="btn shadow-sm btn-outline-success">Danışmanı Ekle</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

         <!--DÖNEM EKLEMEK İÇİN POP-UP MENÜ-->
         <div class="modal fade" id="donemEkle" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success" id="exampleModalLabel">Dönem Ekle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{url('add-semester')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <input class="form-select-md shadow-sm mx-auto w-75 form-control" placeholder="Dönem" type="text" id="donemEkletarih" name="donem">
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn shadow-sm btn-outline-success" data-bs-dismiss="modal">İptal</button>
                        <button id="donemEkleBitir" type="submit" class="btn shadow-sm btn-outline-success">Dönemi Ekle</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

@endsection