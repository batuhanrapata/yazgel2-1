@extends('layout.danisman-master')
@section('content')

        <div class="col">
            <!--GELEN PROJE ÖNERİLERİNİ GÖRÜNTÜLEMEK İÇİN KONTEYNIR-->
            <div class="col-md-12 mt-4 shadow-lg rounded rounded-lg " style="background-color: rgb(247, 247, 247);">

                <table class="table text-success table-bordered">
                    <thead>
                        <th class="text-start">Öğrenci Ad Soyad</th>
                        <th class="text-center" >Detay</th>
                        <th class="text-center" >Durum</th>
                        <th class="text-center">Öneri Onay/Ret</th>
                    </thead>
                    <tbody>
                        @foreach ($suggestions as $suggestion)    
                        <tr>
                            <td class="text-left ps-1 pt-2" style="font-size:15px">
                                {{$suggestion->getStudent->ad}} {{$suggestion->getStudent->soyad}}
                            </td>
                            <td class="text-left ps-1 pt-2" style="font-size:15px">
                                <a class="shadow-sm btn-outline-success btn " data-bs-toggle="modal" data-bs-target="#oneriDetay">Detay</a>
                            </td>
                            <td class="text-left ps-1 pt-2" style="font-size:15px">
                                {{$suggestion->durum}} 
                            </td>
                            <td class="text-left ps-1 pt-2" style="font-size:15px">
                                <a href="{{ url('soedit/'.$suggestion->id) }}" class="btn-outline-success btn  mx-auto" id="oneriOnay">Onay</a>
                                <a href="{{ url('soedit/'.$suggestion->id) }}" class="btn-outline-danger btn  mx-auto" id="oneriRet">Ret</a>
                            </td>
                           
                                    <!-- ÖNERİSİ Detayı İÇİN POP-UP MENÜ-->
                                    <div class="modal fade" id="oneriDetay" tabindex="-1" aria-labelledby="oneriDetay">
                                        <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title text-success" id="exampleModalLabel">Öneri Detayı</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                <b><label>Proje Başlığı</label>
                                                <input id="projeOneriBasligi" type="text " class="shadow-sm mx-auto w-50 form-control my-2 " placeholder="Proje Başlığı" name="baslik"  readonly value="{{$suggestion->baslik}}">
                                                <b><label>Proje Açıklaması Ve Önemi</label>
                                                <textarea minlength="200" maxlength="400" class="form-control my-2" id="projeOneriAciklama" placeholder="Proje Açıklaması Ve Önemi (En az 200, en fazla 400 kelime)" rows="5" name="amac" readonly>{{$suggestion->amac}}</textarea>
                                                <b><label>Projedeki Materyaller, Kullanılan Yöntemler ve Araştırma Olanakları</label>
                                                <textarea minlength="200" maxlength="400" class="form-control my-2" id="projeOneriMateryal" placeholder="Projedeki Materyaller, Kullanılan Yöntemler ve Araştırma Olanakları (En az 300, en fazla 1000 kelime)" rows="5" name="yontem" readonly>{{$suggestion->yontem}}</textarea>
                                                <b><label>Proje Anahtar Kelimeler</label>
                                                <textarea minlength="200" maxlength="400" class="form-control my-2" id="projeOneriAnahtarKelime" placeholder="Proje Anahtar Kelimeler (5 Adet)" rows="2" name="anahtar_kelimeler" readonly>{{$suggestion->anahtar_kelimeler}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--GELEN RAPORLAR GÖRÜNTÜLEMEK İÇİN KONTEYNIR-->
            <div class="col-md-12 mt-4 shadow-lg rounded rounded-lg " style="background-color: rgb(247, 247, 247);">

                <table class="table table-stripped table-hover text-success table-bordered">
                    <thead>
                        <th class="text-start">Öğrenci Bilgisi</th>
                        <th class="text-start">Gelen Raporlar</th>
                        <th class="text-center" style="width: 120px;">Rapor Onay/Ret</th>
                        <th class="text-center" style="width: 100px;">Durum</th>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr>
                        <td class="text-left ps-1 pt-1" style="font-size:15px">
                                <input class="mx-auto mt-3 text-muted form-control" id="raporOgrenciAdi" cols="20" rows="1" readonly="yes" style="resize:none; border:none;background-color: rgb(247, 247, 247)" value="{{$report->getStudent->ad}} {{$report->getStudent->soyad}}">
                            </td>
                            <td class="text-left pt-3" style="font-size:large">
                                <div class="col-lg-8 ms-2 ps-3">
                                    <div class="row-lg-1 mb-2">@if($report->pdf_dosyasi)<a class="text-success small" style="text-decoration: none;" id="raporPDF" href="{{asset('/')}}{{$report->pdf_dosyasi}}"><img width="18px" height="25px" src="{{asset('front/')}}/img/pdf-icon.png">  @else 'Gönderilmedi' @endif</a>
                                    @if($report->word_dosyasi)<a class="text-success small" style="text-decoration: none;margin-left:10px;" id="raporWORD" href="{{asset('/')}}{{$report->word_dosyasi}}"><img width="20px" height="25px" src="{{asset('front/')}}/img/word-icon.png">  @else 'Gönderilmedi' @endif</a></div>
                                </div>
                            </td>
                            <td class="text-center" style="width: 150px;">
                                <button class=" btn-outline-success btn-sm my-auto mx-auto" id="raporOnay">Onay</button>
                                <button class=" btn-outline-danger btn-sm  mx-auto" id="raporRet">Ret</button>
                            </td>
                            <td class="text-center py-4">{{$report->durum}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!--GELEN TEZLERİ GÖRÜNTÜLEMEK İÇİN KONTEYNIR-->
            <div class="col-md-12 mt-4 shadow-lg rounded rounded-lg " style="background-color: rgb(247, 247, 247);">

                <table class="table table-stripped table-hover text-success table-bordered">
                    <thead>
                        <th class="text-start">Öğrenci Bilgisi</th>
                        <th class="text-start">Gelen Raporlar</th>
                        <th class="text-center" style="width: 120px;">Rapor Onay/Ret</th>
                        <th class="text-center" style="width: 100px;">Durum</th>
                    </thead>
                    <tbody>
                        @foreach ($theses as $thesis)
                        <tr>
                        <td class="text-left ps-1 pt-1" style="font-size:15px">
                                <input class="mx-auto mt-3 text-muted form-control" id="raporOgrenciAdi" cols="20" rows="1" readonly="yes" style="resize:none; border:none;background-color: rgb(247, 247, 247)" value="{{$thesis->getStudent->ad}} {{$thesis->getStudent->soyad}}">
                            </td>
                            <td class="text-left pt-3" style="font-size:large">
                                <div class="col-lg-8 ms-2 ps-3">
                                    <div class="row-lg-1 mb-2">@if($thesis->pdf_dosyasi)<a class="text-success small" style="text-decoration: none;" id="raporPDF" href="{{asset('/')}}{{$thesis->pdf_dosyasi}}"><img width="18px" height="25px" src="{{asset('front/')}}/img/pdf-icon.png">  @else 'Gönderilmedi' @endif</a>
                                    @if($thesis->word_dosyasi)<a class="text-success small" style="text-decoration: none;margin-left:10px;" id="raporWORD" href="{{asset('/')}}{{$thesis->word_dosyasi}}"><img width="20px" height="25px" src="{{asset('front/')}}/img/word-icon.png">  @else 'Gönderilmedi' @endif</a></div>
                                </div>
                            </td>
                            <td class="text-center" style="width: 150px;">
                                <button class=" btn-outline-success btn-sm my-auto mx-auto" id="raporOnay">Onay</button>
                                <button class=" btn-outline-danger btn-sm  mx-auto" id="raporRet">Ret</button>
                            </td>
                            <td class="text-center py-4">{{$thesis->durum}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
         
@endsection