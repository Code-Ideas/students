<?php

namespace App\Http\Controllers;

use App\Http\Requests\Front\ClinicRequest;
use App\Http\Requests\Front\ComplainRequest;
use App\Http\Requests\Front\IlliteracyRequest;
use App\Models\Contact;
use App\Models\EBook;
use App\Models\Post;
use App\Models\Service;
use App\Models\MedicalReservation;
use App\Models\MedicalDepartment;
use App\Models\AdminDepartment;
use App\Models\ServiceLayer;
use App\Models\ILiterate;

class WebController extends Controller
{
    public function complain()
    {
        $adminsDepartments =AdminDepartment::pluck('name', 'id');

        return view('front.complain', compact('adminsDepartments'));
    }

    public function storeComplain(ComplainRequest  $request)
    {
        Contact::create($request->input() + ['user_id' => auth()->id(), 'name' => auth()->user()->name,
                                'email' => auth()->user()->email]);

        return view('front.success');
    }
    public function clinic()
    {
        $medicalDepartments = MedicalDepartment::pluck('name', 'id');

        return view('front.clinic', compact('medicalDepartments'));
    }

    public function storeClinic(ClinicRequest  $request)
    {
        MedicalReservation::create($request->input() + ['user_id'=>auth()->user()->id]);

        return view('front.success');
    }

    public function phoneDownload()
    {
        $medicaldepartments=MedicalDepartment::pluck('name', 'id');
        $posts=Post::with('photo')->get();

        return view('front.phoneDownload', compact('posts'));
    }

    public function showService(Service $service)
    {
        $layers = ServiceLayer::where([['service_id', $service->id], ['department_id' , auth()->user()->department_id],
            ['year_id', auth()->user()->year_id]])->orWhere([['service_id', $service->id], ['year_id', null],
            ['department_id' , auth()->user()->department_id]])->with('attachments')->get();

        return view('front.service_layer', compact('layers', 'service'));
    }

    public function news()
    {
        $posts = Post::with('photo')->get();

        return view('front.news', compact('posts'));
    }

    public function singleNews(Post $post)
    {
        $posts = Post::with('photo')->get();

        return view('front.singleNews', compact('post', "posts"));
    }

    public function eBooks()
    {
        $books = EBook::where([['department_id' , auth()->user()->department_id], ['year_id', auth()->user()->year_id]])
                                ->published()->get();

        return view('front.books', compact('books'));
    }

    public function illiteracy()
    {
        $iliterates = ILiterate::where(['user_id' => auth()->id()])->get();

        return view('front.illiteracy', compact('iliterates'));
    }

    public function storeIlliteracy(IlliteracyRequest  $request)
    {
        ILiterate::create($request->input() + ['user_id'=>auth()->user()->id]);

        return redirect()->back()->with('success', 'تم الإضافة بنجاح');
    }

    public function notifications()
    {
        $userNotifications = auth()->user()->notifications();
        if (count(auth()->user()->newNotifications())) {
            $userNotifications->whereJsonDoesntContain('seen_users', auth()->id())->update(['seen_users' => [auth()->id()]]);
        }
        $notifications = $userNotifications->paginate(10);

        return view('front.notifications', compact('notifications'));
    }
}
