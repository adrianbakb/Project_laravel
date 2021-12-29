<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialization;
use App\Repositories\UserRepository;
use App\Repositories\SpecializationRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
     public function index(UserRepository $userRepo){

      /* if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin')
       {
         return redirect()->route('login');
       }*/

       $docstatistics = $userRepo->getDoctorsStatistisc();
       $patstatistics = $userRepo->getPatientsStatistisc();
       $visitstatistics = $userRepo->getVisitsStatistisc();
       $specializations = $userRepo->getAllSpecializations();
       $users = $userRepo->getAllDoctors();

       return view('dashboard',["doctorsList"=>$users,
                                "docstatistics"=> $docstatistics,
                                "patstatistics"=> $patstatistics,
                                "visitstatistics"=> $visitstatistics,
                                "specializations"=>$specializations ]);
     }
}
