<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{


  public function index(UserRepository $userRepo){

    if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $users = $userRepo->getAllPatients();

    return view('patients.list',["patientsList"=>$users,
                                "footerYear"=>date("Y"),
                                "title"=>"Moduł pacjentów" ]);
  }

  public function show(UserRepository $userRepo,$id){

    if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }


    $patient = $userRepo->find($id);

    return view('patients.show',["patient"=>$patient,
                                "footerYear"=>date("Y"),
                                "title"=>"Moduł pacjentów"]);
  }

  public function store(Request $request){


    $request->validate([                                                      //walidacja danych wprowadzonych do formularza
      'name' => 'required|max:255',  //pole wymagane max 255 znaków
      'email' => 'required|email|unique:users,email', //pole wymagane,unikalne posrod tabeli uzytkownikow
      'password' => 'required|min:5',
      'phone' => 'required',
      'address' => 'required',
      'pesel' => 'required'
    ]);

    $patient = new User;
    $patient->name = $request->input('name');
    $patient->email = $request->input('email');
    $patient->password = bcrypt($request->input('password'));
    $patient->phone = $request->input('phone');
    $patient->address = $request->input('address');
    $patient->pesel = $request->input('pesel');
    $patient->status = $request->input('status');
    $patient->type = 'patient';
    $patient->save();

    //return view('patients.confirm',[ "footerYear"=>date("Y"),
                                     //"title"=>"Moduł pacjentów"]);
    return redirect()->action('App\Http\Controllers\PatientController@index');
  }

}
