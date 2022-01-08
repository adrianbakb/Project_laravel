<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialization;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
  public function show(UserRepository $userRepo,$id){

    if(Auth::user()->type != 'secretary' && Auth::user()->type != 'admin')
    {
      return redirect()->route('login');
    }

    $doctor = $userRepo->find($id);

    return view('panels.show',["doctor"=>$doctor,
                                "footerYear"=>date("Y"),
                                "title"=>"Moduł lekarzy"]);
  }
}
