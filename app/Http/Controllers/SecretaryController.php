<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class SecretaryController extends Controller
{

  public function index(UserRepository $userRepo){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $users = $userRepo->getAllSecretary();

    return view('secretary.list',["secretaryList"=>$users,
                                "title"=>"Moduł sekretarek" ]);
  }

  public function show(UserRepository $userRepo,$id){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $secretary = $userRepo->find($id);

    return view('secretary.show',["secretary"=>$secretary,
                                "footerYear"=>date("Y"),
                                "title"=>"Moduł sekretarek"]);
  }

  public function create(){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    return view('secretary.create',["title"=>"Moduł sekretarek"]);
  }

  public function store(Request $request){


    $request->validate([                                                      //walidacja danych wprowadzonych do formularza
      'name' => 'required|max:255',  //pole wymagane max 255 znaków
      'email' => 'required|email|unique:users,email', //pole wymagane,unikalne posrod tabeli uzytkownikow
      'password' => 'required|min:5',
      'phone' => 'required',
      'address' => 'required',
      'pesel' => 'required',
      'status' => 'required'
    ]);

    $secretary = new User;
    $secretary->name = $request->input('name');
    $secretary->email = $request->input('email');
    $secretary->password = bcrypt($request->input('password'));
    $secretary->phone = $request->input('phone');
    $secretary->address = $request->input('address');
    $secretary->pesel = $request->input('pesel');
    $secretary->status = $request->input('status');
    $secretary->type = 'secretary';
    $secretary->save();

    return redirect()->action('App\Http\Controllers\SecretaryController@index');
  }

  public function edit(UserRepository $userRepo,$id){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $secretary = $userRepo->find($id);

    return view('secretary.edit', ["secretary" => $secretary,
                                    "footerYear" =>date("Y")]);
  }

  public function delete(UserRepository $userRepo,$id){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $secretary = $userRepo->delete($id);
    return redirect('secretary');
  }

  public function editStore(Request $request){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $secretary = User::find($request->input('id'));
    $secretary->name = $request->input('name');
    $secretary->email = $request->input('email');
    $secretary->phone = $request->input('phone');
    $secretary->address = $request->input('address');
    $secretary->pesel = $request->input('pesel');
    $secretary->status = $request->input('status');
    $secretary->save();

    return redirect()->action('App\Http\Controllers\SecretaryController@index');
  }

}
