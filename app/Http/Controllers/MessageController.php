<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Repositories\MessageRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Mail;

class MessageController extends Controller
{

  public function create(UserRepository $userRepo){

    $patients = $userRepo->getAllPatients();
    $secretary = $userRepo->getAllSecretary();

    return view('message.create',["patients"=>$patients,"secretary"=>$secretary,"title"=>"Moduł wiadomości"]);
  }

  public function store(Request $request){

    $message = new Message;
    $message->patient_id = $request->input('patient');
    $message->secretary_id = $request->input('secretary');
    $message->message = $request->input('message');
    $message->save();

    $patient = User::find($message->patient_id);
    $secretary = User::find($message->secretary_id);

    Mail::send('emails.message',['message' => $message], function ($m) use ($message,$secretary){
      $m->to($secretary->email,$secretary->name)->subject('Nowe zapytanie');
    });

    return redirect()->action('App\Http\Controllers\HomeController@index');
  }
}
