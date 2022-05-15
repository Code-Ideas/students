<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use App\Models\Contact;
use App\Models\EBook;
use App\Models\Collage;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Service;
use App\Models\MedicalReservation;
use App\Models\MedicalDepartment;
use App\Models\Admin;
use App\Models\AdminDepartment;
use App\Models\ServiceLayer;

class WebController extends Controller
{
 public function complain(){
 $admins=AdminDepartment::pluck('name', 'id');
 $services=Service::whereJsonContains('collages', auth()->user()->collage_id)->get();
 $posts=Post::with('photo')->get();


    return view('complain',compact('admins','services','posts'));}
public function storeComplain(request  $request){
     $validateData=$request->validate([
      'name'=>'required|min:5',
      'email'=>'required|email',
      'phone'=>'required|integer|digits:11',
      'message'=>'required|min:15',
      'admin_id'=>'required'


     ]

    );
    Contact::create([
        'name'=>$request->name
        ,'email'=>$request->email
        ,'phone'=>$request->phone
        ,'message'=>$request->message
        ,'admin_id'=>$request->admin_id

    ]);
    return view('success');

}
    public function clinic()
    {
        $medicalDepartments = MedicalDepartment::pluck('name', 'id');

        return view('clinic', compact('medicalDepartments'));
    }

    public function storeClinic(request  $request)
    {
        $request->validate([
            'phone' => 'required|numeric|digits:11',
            'message' => 'required|string|min:15',
            'medical_department_id' => 'required|numeric|exists:medical_departments,id'
           ]);
        MedicalReservation::create($request->input() + ['user_id'=>auth()->user()->id]);

        return view('success');
    }

    public function phoneDownload()
    {
        $medicaldepartments=MedicalDepartment::pluck('name', 'id');
        $posts=Post::with('photo')->get();

        return view("phoneDownload", compact('posts'));
    }

    public function showService(Service $service)
    {
        $layers = ServiceLayer::where([['service_id', $service->id], ['department_id' , auth()->user()->department_id],
            ['year_id', auth()->user()->year_id]])->with('attachments')->get();

        return view('service_layer', compact('layers', 'service'));
    }

    public function news()
    {
        $posts = Post::with('photo')->get();

        return view('news', compact('posts'));
    }

    public function singleNews(Post $post)
    {
        $posts = Post::with('photo')->get();

        return view('singleNews', compact('post', "posts"));
    }

    public function eBooks()
    {
        $books = EBook::where([['department_id' , auth()->user()->department_id], ['year_id', auth()->user()->year_id]])->get();

        return view('books', compact('books'));
    }

    public function illiteracy()
    {
        return view('illiteracy');
    }
}
