@extends('layout.ogrenci-master')
@section('content')
    


 <!--DANIŞMAN BİLGİLERİ KONTEYNIR-->
    <div class="col-10 mt-4 shadow-lg rounded rounded-lg mx-auto" style="background-color: rgb(247, 247, 247);">
      <div class="col mx-auto pt-2" style="height: 55px;">
        <p class=" text-center text-success display-6 "><small>Danışman Bilgilerim</small></p>
      </div>
      <div class="row g-1 mt-2">
        <div class="col-2 mx-auto">
          <p style=" background-color: rgb(247, 247, 247)" class="text-center text-muted my-3" id="danismanBilgisiAd">{{ isset($top->getConsultant->ad) ? $top->getConsultant->ad : '' }}</p>
        </div>
        <div class="col-2 mx-auto">
        <p style="background-color: rgb(247, 247, 247)" class="text-center  text-muted my-3" id="danismanBilgisiSoyAd">{{ isset($top->getConsultant->soyad) ? $top->getConsultant->soyad : '' }}</p>
        </div>
        <div class="col-2 mx-auto">
        <p style="background-color: rgb(247, 247, 247)" class="text-center text-muted my-3" id="danismanBilgisiMail">{{ isset($top->getConsultant->email) ? $top->getConsultant->email : '' }}</p>
        </div>
        <div class="col-2 mx-auto">
        <p style="background-color: rgb(247, 247, 247)" class="text-center text-muted my-3" id="danismanBilgisiTelNo">{{ isset($top->getConsultant->telefon) ? $top->getConsultant->telefon : '' }}</p>
        </div>
      </div>
    </div>

    <br><br>
    @if(Session("status"))
    <div class="alert alert-success">
       <p>{{ Session("status") }}</p>
    </div>
    @endif


    <!--PROJE ÖNERİ YÜKLEME KISMININ KONTEYNIRI-->
    <div class="row">
      <div class="col-md-12 mt-4 shadow-lg rounded rounded-lg" style="background-color: rgb(247, 247, 247);">
        <div class="col mx-auto">
          <button class="shadow-sm btn-outline-success btn my-3" data-bs-toggle="modal" data-bs-target="#projeonerisi">Proje Önerisi Yap</button>
        </div>
        <table class="table table-stripped table-hover  text-success">
          <thead>
            <th class="text-start">Proje Önerisi</th>
            <th class="text-center" style="width: 120px;">Öneri Onay Durumu</th>
          </thead>
          <tbody>
            @foreach ($suggestions as $suggestion)    
            <tr>
              <td class="text-left text-break"style="font-size:large">{{ isset($suggestion->baslik) ? $suggestion->baslik : '' }} </td>
              <td class="text-center text-break" style="width: 100px;">{{ isset($suggestion->durum) ? $suggestion->durum : '' }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

     
        <!--RAPOR YÜKLEME KISMININ KONTEYNIRI-->
        <div class="col-md-12 mt-4 shadow-lg rounded rounded-lg " style="background-color: rgb(247, 247, 247);">
          @if($suggest!=null)
          <div class="col mx-auto">
            <button class="shadow-sm btn-outline-success btn my-3" data-bs-toggle="modal" data-bs-target="#projeRaporu">Proje Raporu Yükle</button>
          </div>
          @endif
          <table class="table table-stripped table-hover  text-success">
            <thead>
              <th class="text-start">Word Dosyası</th>
              <th class="text-start">Pdf Dosyası</th>
              <th class="text-start">Gönderilme Tarihi</th>
              <th class="text-center" style="width: 120px;">Rapor Onay Durumu</th>
            </thead>
            <tbody>
              @foreach ($reports as $report)    
              <tr>
                <td class="text-left text-break"style="font-size:large"> @if($report->word_dosyasi) <a href="{{asset('/')}}{{$report->word_dosyasi}}">indir</a> @else 'Gönderilmedi' @endif </td>
                <td class="text-left text-break"style="font-size:large"> @if($report->pdf_dosyasi) <a href="{{asset('/')}}{{$report->pdf_dosyasi}}">indir</a> @else 'Gönderilmedi' @endif </td>
                <td class="text-left text-break"style="font-size:large"> {{ isset($report->created_at) ? $report->created_at : 'Gönderilmedi' }} </td>
                <td class="text-center text-break" style="width: 100px;">{{ isset($report->durum) ? $report->durum : '' }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

     
    
      <!--TEZ YÜKLEME KISMININ KONTEYNIRI-->
      <div class="col-md-12 mt-4 mb-4 shadow-lg rounded rounded-lg" style="background-color: rgb(247, 247, 247);">
        @if($reportc!=null)
        <div class="col mx-auto">
          <button class="shadow-sm btn-outline-success btn my-3" data-bs-toggle="modal" data-bs-target="#projeTezi">Proje Tezi Yükle</button>
        </div>
        @endif
        <table class="table table-stripped table-hover text-success">
          <thead>
              <th class="text-start">Word Dosyası</th>
              <th class="text-start">Pdf Dosyası</th>
              <th class="text-start">Gönderilme Tarihi</th>
            <th class="text-center" style="width: 120px;">Tez Onay Durumu</th>
          </thead>
          <tbody>
            @foreach ($theses as $thesis)    
            <tr>
              <td class="text-left text-break"style="font-size:large"> @if($thesis->word_dosyasi) <a href="{{asset('/')}}{{$thesis->word_dosyasi}}">indir</a> @else 'Gönderilmedi' @endif </td>
              <td class="text-left text-break"style="font-size:large"> @if($thesis->pdf_dosyasi) <a href="{{asset('/')}}{{$thesis->pdf_dosyasi}}">indir</a> @else 'Gönderilmedi' @endif </td>
              <td class="text-left text-break"style="font-size:large"> {{ isset($thesis->created_at) ? $thesis->created_at : 'Gönderilmedi' }} </td>
              <td class="text-center text-break" style="width: 100px;">{{ isset($thesis->durum) ? $thesis->durum : '' }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

     
  

  <!--PROJE ÖNERİSİ YAPMAK İÇİN POP-UP MENÜ-->
  <div class="modal fade" id="projeonerisi" tabindex="-1" aria-labelledby="projeOneri">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success" id="exampleModalLabel">Proje Önerisi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form action="{{url('add-suggestion')}}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            @method('POST')
            @csrf
            <div class="form-group">
              <input id="projeOneriBasligi" type="text " class="shadow-sm mx-auto w-50 form-control my-2 " placeholder="Proje Başlığı" name="baslik">
              <textarea minlength="200" maxlength="400" class="form-control my-2" id="projeOneriAciklama" placeholder="Proje Açıklaması Ve Önemi (En az 200, en fazla 400 kelime)" rows="5" name="amac"></textarea>
              <textarea minlength="200" maxlength="400" class="form-control my-2" id="projeOneriMateryal" placeholder="Projedeki Materyaller, Kullanılan Yöntemler ve Araştırma Olanakları (En az 300, en fazla 1000 kelime)" rows="5" name="yontem"></textarea>
              <textarea minlength="20" maxlength="400" class="form-control my-2" id="projeOneriAnahtarKelime" placeholder="Proje Anahtar Kelimeler (5 Adet)" rows="1" name="anahtar_kelimeler"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn shadow-sm btn-outline-success" data-bs-dismiss="modal">İptal</button>
          <button id="projeOneriBitir" type="submit" class="btn shadow-sm btn-outline-success">Öneriyi Tamamla</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <!--RAPOR YÜKLEMEK İÇİN POP-UP MENÜ-->
  <div class="modal fade" id="projeRaporu" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success">Proje Rapor Dosyaları</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form action="{{url('add-report')}}" method="POST" enctype="multipart/form-data">
          @method('POST')
          @csrf
          <div class="modal-body">
         
            <label class="text-success" for="formFileSm">Proje Raporu Word Dosyası</label>
            <input class=" my-2 form-control form-control-sm" id="projeRaporWord" type="file" name="word_dosyasi">
            <label class="text-success" for="formFileSm">Proje Raporu PDF Dosyası</label>
            <input class="my-2 form-control form-control-sm" id="projeRaporPdf" type="file" name="pdf_dosyasi">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn shadow-sm btn-outline-success" data-bs-dismiss="modal">İptal</button>
          <button id="projeRaporuBitir" type="submit" class="btn shadow-sm btn-outline-success">Rapor Dosyalarını Yükle</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <!--TEZ YÜKLEMEK İÇİN POP-UP MENÜ-->
  <div class="modal fade" id="projeTezi" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success">Proje Tezi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form action="{{url('add-thesis')}}" method="POST" enctype="multipart/form-data">
          @method('POST')
          @csrf
        <div class="modal-body">
            <div class="form-group">
                <label class="text-success" for="formFileSm">Proje Tezi Word Dosyası</label>
                <input class=" my-2 form-control form-control-sm" id="projeTezWord" type="file" name="word_dosyasi">
                <label class="text-success" for="formFileSm">Proje Tezi PDF Dosyası</label>
                <input class="my-2 form-control form-control-sm" id="projeTezPdf" type="file" name="pdf_dosyasi">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn shadow-sm btn-outline-success" data-bs-dismiss="modal">İptal</button>
          <button id="projeTeziBitir" type="submit" class="btn shadow-sm btn-outline-success">Tez Dosyalarını Yükle</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  
@endsection