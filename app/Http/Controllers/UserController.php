<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Consultant;
use App\Models\Semester;
use App\Models\Suggestion;
use App\Models\Report;
use App\Models\Thesis;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    
    public function index()
    {
        $data['consultants']=Consultant::orderBy('created_at','DESC')->get();
        $data['students']=Student::orderBy('created_at','DESC')->get();
        $data['semesters']=Semester::orderBy('created_at','DESC')->get();
        return view('front.yonetici-kayitlar',$data);
    }

    
    public function homepage()
    {
        $data['consultants']=Consultant::orderBy('created_at','DESC')->get();
        $data['semesters']=Semester::orderBy('created_at','DESC')->get();
        return view('front.yonetici-anasayfa',$data);
    }

    
    public function studentAdd(Request $request)
    {
        $admin = new Admin;
        $admin->name = $request->input('ad');
        $admin->email = $request->input('email');
        $admin->role = 'student';
        $admin->password =bcrypt($request->input('email')) ;

        $student = new Student;
        $student->ad = $request->input('ad');
        $student->soyad = $request->input('soyad');
        $student->fakulte = $request->input('fakulte');
        $student->bolum = $request->input('bolum');
        $student->sinif = $request->input('sinif');
        $student->email = $request->input('email');
        $student->telefon = $request->input('telefon');
        $student->numarasi = $request->input('numarasi');
        $student->consultant_id = $request->input('consultant_id');
        $student->semester_id = $request->input('semester_id');
        $student->fotograf = "uploads/default.jpg";

        if($request->hasFile('fotograf')){
            $fotografname= time().'.'.$request->fotograf->getClientOriginalName();
            $request->fotograf->move(public_path('uploads'), $fotografname);
            $student->fotograf='uploads/'.$fotografname;
        }
        $student->save();
        $admin->save();

        return redirect('/yonetici-anasayfa')->with('status','Öğrenci Başarıyla Eklendi');
    }

    public function consultantAdd(Request $request)
    {
        $admin = new Admin;
        $admin->name = $request->input('ad');
        $admin->email = $request->input('email');
        $admin->role = 'consultant';
        $admin->password = bcrypt($request->input('email')) ;

        $consultant = new Consultant;
        $consultant->ad = $request->input('ad');
        $consultant->soyad = $request->input('soyad');
        $consultant->fakulte = $request->input('fakulte');
        $consultant->bolum = $request->input('bolum');
        $consultant->email = $request->input('email');
        $consultant->unvan = $request->input('unvan');
        $consultant->telefon = $request->input('telefon');
        $consultant->semester_id = $request->input('semester_id');
        $consultant->fotograf = "uploads/default.jpg";

        if($request->hasFile('fotograf')){
            $fotografname= time().'.'.$request->fotograf->getClientOriginalName();
            $request->fotograf->move(public_path('uploads'), $fotografname);
            $consultant->fotograf='uploads/'.$fotografname;
        }
        $consultant->save();
        $admin->save();

        return redirect('/yonetici-anasayfa')->with('status','Danışman Başarıyla Eklendi');
    }

    public function semesterAdd(Request $request)
    {
        $semester = new Semester;
        $semester->donem = $request->input('donem');
        
        $semester->save();
        return redirect('/yonetici-anasayfa')->with('status','Dönem Başarıyla Eklendi');
    }

    public function danismanOgrenciler()
    {
        $data['students']=Student::orderBy('created_at','DESC')->get();
        return view('front.danisman-ogrenciler',$data);
    }

    public function shomepage()
    {
      /*  $userd = Auth::user();
        $user = Student::where('email',$userd->email)->first();*/
        $data['suggestions']= Suggestion::where('student_id','1')->orderBy('created_at','DESC')->get();
        $data['suggest']= Suggestion::where('student_id','1')->where('durum','onaylandı')->first();
        $data['reports']= Report::where('student_id','1')->orderBy('created_at','DESC')->get();
        $data['reportc']= Report::where('student_id','1')->where('durum','onaylandı')->first();
        $data['theses']= Thesis::where('student_id','1')->orderBy('created_at','DESC')->get();
        $data['top']= Student::where('id','1')->first();;
        return view('front.ogrenci-anasayfa',$data);
    }

    public function suggestionAdd(Request $request)
    {
        $suggestion = new Suggestion;
        $suggestion->baslik = $request->input('baslik');
        $suggestion->amac = $request->input('amac');
        $suggestion->anahtar_kelimeler = $request->input('anahtar_kelimeler');
        $suggestion->yontem = $request->input('yontem');
        $suggestion->student_id = '1';
        $suggestion->consultant_id = '1';

        $suggestion->save();
        return redirect('/ogrenci-anasayfa')->with('status','Proje Önerisi Başarıyla Eklendi');
    }

    public function reportAdd(Request $request)
    {
        $report = new Report;
        $report->student_id = '1';
        $report->consultant_id = '1';
        $report->word_dosyasi = "uploads/default.jpg";
        $report->pdf_dosyasi = "uploads/default.jpg";


        if($request->hasFile('word_dosyasi')){
            $dosyaname= time().'.'.$request->word_dosyasi->getClientOriginalName();
            $request->word_dosyasi->move(public_path('uploads/word'), $dosyaname);
            $report->word_dosyasi='uploads/word/'.$dosyaname;
        }
        if($request->hasFile('pdf_dosyasi')){
            $pdosyaname= time().'.'.$request->pdf_dosyasi->getClientOriginalName();
            $request->pdf_dosyasi->move(public_path('uploads/pdf'), $pdosyaname);
            $report->pdf_dosyasi='uploads/pdf/'.$pdosyaname;
        }
        $report->save();
        return redirect('/ogrenci-anasayfa')->with('status','Rapor Başarıyla Eklendi');
    }

    public function thesisAdd(Request $request)
    {
        $thesis = new Thesis;
        $thesis->student_id = '1';
        $thesis->consultant_id = '1';
        $thesis->word_dosyasi = null;
        $thesis->pdf_dosyasi = null;


        if($request->hasFile('word_dosyasi')){
            $dosyaname= time().'.'.$request->word_dosyasi->getClientOriginalName();
            $request->word_dosyasi->move(public_path('uploads/word'), $dosyaname);
            $thesis->word_dosyasi='uploads/word/'.$dosyaname;
        }
        if($request->hasFile('pdf_dosyasi')){
            $pdosyaname= time().'.'.$request->pdf_dosyasi->getClientOriginalName();
            $request->pdf_dosyasi->move(public_path('uploads/pdf'), $pdosyaname);
            $thesis->pdf_dosyasi='uploads/pdf/'.$pdosyaname;
        }
        $thesis->save();
        return redirect('/ogrenci-anasayfa')->with('status','Tez Başarıyla Eklendi');
    }

    public function chomepage()
    {
        $data['suggestions']= Suggestion::where('consultant_id','1')->orderBy('created_at','DESC')->get();
        $data['reports']= Report::where('consultant_id','1')->orderBy('created_at','DESC')->get();
        $data['theses']= Thesis::where('consultant_id','1')->orderBy('created_at','DESC')->get();
        $data['top']= Consultant::where('id','1')->first();;
        return view('front.danisman-anasayfa',$data);
    }
 /*
    public function sedit(Request $request,$id){
        $suggestion=Suggestion::find($id);
        $suggestion->durum='onaylandı';
        $suggestion->save();
      }
      public function sredit(Request $request,$id){
        $suggestion=Suggestion::find($id);
        $suggestion->durum='reddedildi';
        $suggestion->save();
      }
      */
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
       
    }
}
