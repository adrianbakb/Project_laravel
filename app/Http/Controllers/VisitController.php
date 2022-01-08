<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\User;
use App\Repositories\VisitRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Mail;

class VisitController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(VisitRepository $visitRepo){


    $visits = $visitRepo ->getAll();

    return view('visits.list',["visits"=>$visits,
                                "footerYear"=>date("Y"),
                                "title"=>"Moduł wizyt"]);
  }

  public function create(UserRepository $userRepo){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $doctors = $userRepo->getAllDoctors();
    $patients = $userRepo->getAllPatients();

    return view('visits.create',["patients"=>$patients, "doctors" =>$doctors ,"footerYear"=>date("Y"),"title"=>"Moduł wizyt"]);
  }

  public function store(Request $request){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }
    $request->validate([                                                      //walidacja danych wprowadzonych do formularza
      'date' => 'required'
    ]);

    $visit = new Visit;
    $visit->doctor_id = $request->input('doctor');
    $visit->patient_id = $request->input('patient');
    $visit->date = $request->input('date');
    $visit->save();

    $patient = User::find($visit->patient_id);

    Mail::send('emails.visit',['visit' => $visit], function ($m) use ($visit,$patient){
      $m->to($patient->email,$patient->name)->subject('Nowa wizyta');
    });

    return redirect()->action('App\Http\Controllers\VisitController@index');
  }
}
