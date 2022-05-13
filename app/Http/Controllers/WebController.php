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
public function clinic(){
    $collages=Collage::pluck('name', 'id');
    $medicaldepartments=MedicalDepartment::pluck('name', 'id');
    $services=Service::whereJsonContains('collages', auth()->user()->collage_id)->get();
    $posts=Post::with('photo')->get();

    return view('clinic',compact('collages','medicaldepartments','services','posts'));
    }
    
    public function storeClinic(request  $request){
        $validateData=$request->validate([
            'email'=>'required|email',
            'phone'=>'required|integer|digits:11',
            'message'=>'required|min:15',
            'medical_department_id'=>'required',
            'collage_id'=>'required'
      
      
           ]
          
          );
        MedicalReservation::create([
            'user_id'=>auth()->user()->id,
            'email'=>$request->email
            ,'phone'=>$request->phone
            ,'message'=>$request->message
            ,'medical_department_id'=>$request->medical_department_id,
            'collage_id'=>$request->collage_id
        ]);
    return view('success');
    }
    
    public function phoneDownload(){
        $medicaldepartments=MedicalDepartment::pluck('name', 'id');
        $services=Service::whereJsonContains('collages', auth()->user()->collage_id)->get();
        $posts=Post::with('photo')->get();

    
        return view("phoneDownload",compact('services','posts'));
    }

    public function showService($service_id,$year_id,$department_id){
        $services2=Service::with('layers')->find($service_id);
        $services_attachments=ServiceLayer::with('attachments')->where('year_id',$year_id)->where('department_id',$department_id)->find($service_id);
        $posts=Post::with('photo')->get();
        $services=Service::whereJsonContains('collages', auth()->user()->collage_id)->get();

        return view('service_layer',compact('services2','services_attachments','services','posts'));


    }
    public function news(){
        $posts=Post::with('photo')->get();
        $services_attachments=ServiceLayer::with('attachments')->where('year_id',$year_id)->where('department_id',$department_id)->find($service_id);

        return view('news',compact('posts','services'));
    }
    public function singleNews($news_id){
        $posts=Post::with('photo')->find($news_id);
        $allposts=Post::with('photo')->get();
        $services=Service::whereJsonContains('collages', auth()->user()->collage_id)->get();



        return view('singleNews',compact('posts',"allposts",'services'));
    }
    public function electronicbook(){
        $books = EBook::where([['department_id' , auth()->user()->department_id], ['year_id', auth()->user()->year_id]])->get();
        $services=Service::whereJsonContains('collages', auth()->user()->collage_id)->get();
        $posts=Post::with('photo')->get();


        return view('electronicbook',compact('books','services','posts'));
    }  public function illiteracy(){
        $services=Service::whereJsonContains('collages', auth()->user()->collage_id)->get();
        $posts=Post::with('photo')->get();

        return view('illetracy',compact('services','posts'));
    }
}
