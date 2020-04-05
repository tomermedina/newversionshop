<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ConfigController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Models\Admin\User;
class EmailController extends Controller
{
    //
    public function sendForgotPassword($userId)
    {
      // code...

      $user = User::where('id' , $userId)->first();
      $mail = $user->email;
      if ($user){

        $data = array('name'=>$user->first_name .' '.$user->last_name ,'id' =>Hash::make($user->id) );
        $mail = Mail::send('admin.email.mail-forgot-password', $data, function($message) use ($mail)  {
            $message->to($mail, ' ')->subject
               ('New Version Shop | Forgot Password');
            $message->from(ConfigController::setEmailSenderConfig(),'New Version Shop');
         });
         return "success";
       }
    }
}