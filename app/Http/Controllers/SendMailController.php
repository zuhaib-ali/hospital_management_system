<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{

    public function sendMailToUser(Request $request){
        // MAIL CONTENT 
        $mail_content = [
            'title'=> 'email title',
            'body'=> 'this mail is sent from HOSPITAL MANAGEMENT SYSTEM for your appointment',
            'hospital' => $request->hospital,
        ];
        $mail_sent = Mail::to($request->email_id)->send(new SendMail($mail_content));
        return back()->with('mail_sent', "The mail sent to ".$request->email_id);

        
    }
}
