<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Repositories\SpecializationRepository;
use Illuminate\Support\Facades\Auth;


class SpecializationController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(SpecializationRepository $specializationRepo){

    $specializations = $specializationRepo ->getAll();

    return view('specializations.list',["specializations"=>$specializations,
                                "footerYear"=>date("Y"),
                                "title"=>"Moduł specjalizacji"]);
  }
  public function create(){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    return view('specializations.create');
  }

  public function store(Request $request){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $specialization = new Specialization;
    $specialization->name = $request->input('name');
    $specialization->save();
    return redirect()->action('App\Http\Controllers\SpecializationController@index');
  }
}
