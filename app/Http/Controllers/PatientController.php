<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{


  public function index(UserRepository $userRepo){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $users = $userRepo->getAllPatients();

    return view('patients.list',["patientsList"=>$users,
                                "footerYear"=>date("Y"),
                                "title"=>"Moduł pacjentów" ]);
  }

 public function show(UserRepository $userRepo,$id){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }


    $patient = $userRepo->find($id);

    return view('patients.show',["patient"=>$patient,
                                 "title"=>"Moduł pacjentów"]);
  }

  public function create(){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    return view('patients.create',["title"=>"Moduł pacjentów"]);
  }


  public function store(Request $request){

    $request->validate([                                                      //walidacja danych wprowadzonych do formularza
      'name' => 'required|max:255',  //pole wymagane max 255 znaków
      'email' => 'required|email|unique:users,email', //pole wymagane,unikalne posrod tabeli uzytkownikow
      'password' => 'required|min:5',
      'phone' => 'required',
      'address' => 'required',
      'pesel' => 'required|min:11|max:11'
    ]);

    $patient = new User;
    $patient->name = $request->input('name');
    $patient->email = $request->input('email');
    $patient->password = bcrypt($request->input('password'));
    $patient->phone = $request->input('phone');
    $patient->address = $request->input('address');
    $patient->pesel = $request->input('pesel');
    $patient->status = 'NULL';
    $patient->type = 'patient';
    $patient->save();

    return redirect()->action('App\Http\Controllers\PatientController@index');
  }

  public function edit(UserRepository $userRepo,$id){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $patient = $userRepo->find($id);

    return view('patients.edit', ["patient" => $patient,
                                    "footerYear" =>date("Y")]);
  }

  public function delete(UserRepository $userRepo,$id){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $patient = $userRepo->delete($id);
    return redirect('patients');
  }

  public function editStore(Request $request){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $patient = User::find($request->input('id'));
    $patient->name = $request->input('name');
    $patient->email = $request->input('email');
    $patient->phone = $request->input('phone');
    $patient->address = $request->input('address');
    $patient->pesel = $request->input('pesel');
    $patient->status = 'NULL';
    $patient->save();

    return redirect()->action('App\Http\Controllers\PatientController@index');
  }


}
