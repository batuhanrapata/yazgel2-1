@extends('layout.yonetici-master')
@section('content')
    

        <div class="col-sm-12 mt-5 shadow-lg rounded rounded-lg " style="background-color: rgb(247, 247, 247);">
            <div class="table-responsive">
                <table class="table table-stripped table-hover text-success">
                    <thead>
                        <th class="text-start">Danışman</th>
                        <th class="text-start">Adı</th>
                        <th class="text-start">Soyadı</th>
                        <th class="text-start">Email</th>
                        <th class="text-start">Fakülte</th>
                        <th class="text-start">Bölüm</th>
                        <th class="text-start">Ünvan</th>
                        <th class="text-start">Telefon Numarası</th>
                        <th class="text-start">Dönem</th>

                    </thead>
                    <tbody>
                        @foreach ($consultants as $consultant)
                        <tr>
                            <td class="text-center"> <img src="{{asset('/')}}{{$consultant->fotograf}}" width="60px" height="60px"></td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$consultant->ad}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$consultant->soyad}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$consultant->email}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$consultant->fakulte}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$consultant->bolum}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$consultant->unvan}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$consultant->telefon}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$consultant->getSemester->donem}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        <div class="col-sm-12 mt-5 shadow-lg rounded rounded-lg " style="background-color: rgb(247, 247, 247);">
            <div class="table-responsive">
                <table class="table table-stripped table-hover text-success">
                    <thead>
                        <th class="text-start">Öğrenci</th>
                        <th class="text-start">Adı</th>
                        <th class="text-start">Soyadı</th>
                        <th class="text-start">Numarası</th>
                        <th class="text-start">Fakülte</th>
                        <th class="text-start">Bölüm</th>
                        <th class="text-start">Sınıf</th>
                        <th class="text-start">Telefon Numarası</th>
                        <th class="text-start">E-Posta</th>
                        <th class="text-start">Danışman</th>
                        <th class="text-start">Dönem</th>

                    </thead>
                    <tbody>
                        @foreach ($students as $student)     
                    
                        <tr>
                            <td class="text-center"> <img src="{{asset('/')}}{{$student->fotograf}}" width="60px" height="60px"></td>
                            <td class="text-center ps-1 pt-5 text-break" style="font-size:16px">{{$student->ad}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$student->soyad}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$student->numarasi}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$student->fakulte}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$student->bolum}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$student->sinif}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$student->telefon}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$student->email}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px">{{$student->getConsultant->ad}} {{$student->getConsultant->soyad}}</td>
                            <td class="text-center ps-1 pt-5 " style="font-size:16px"> {{$student->getSemester->donem}}</td>

                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-sm-4  mt-5 shadow-lg rounded rounded-lg " style="background-color: rgb(247, 247, 247);">
            <div class="table-responsive">
                <table class="table table-stripped table-hover text-success">
                    <thead>
                        <th class="text-start">Dönemler</th>
                    </thead>
                    <tbody>
                        @foreach ($semesters as $semester)     
                        <tr>
                            <td class="text-center ps-1 pt-4 text-break" style="font-size:16px">{{$semester->donem}}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>

@endsection