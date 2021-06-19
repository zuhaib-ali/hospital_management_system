<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Template;
use DB;


class SendMailController extends Controller
{

    public function addTmp(Request $request)
    {
        if($request->editor1 || $request->title != NULL)
        {
            $tmp  =   DB::table('templates')->where('id','1')->update(['body'=>$request->editor1]);
            return back()->with('updated','Template Updated Successfully');

        }else{
            $addTmp     =   Template::create([
                'title'     =>  $request->title,
                'body'      =>  $request->editor1    
            ]);

            if ($addTmp ==  true) {
                return back()->with('added', 'Template Added Successfully');
            }else{
                return back()->with('failed', 'Failed To Template');
            }
        }

    }

    public function sendMailToUser(Request $request){

        $location   = DB::table('locations')->where('name',$request->hospital)->first();
        $patient    = DB::table('users')->where('email',$request->email_id)->first();
        $tmp        = DB::table('templates')->where('id','1')->first();


        if($tmp->body){

            $tmp->body = str_replace("[[Full_name]]",$patient->first_name." ".$patient->last_name, $tmp->body);
            $tmp->body = str_replace("[[Location]]",$location->name.", ".$location->address, $tmp->body);
            $tmp->body = str_replace("[[Email]]",$location->email, $tmp->body);
            $tmp->body = str_replace("[[Phone]]",$location->phone, $tmp->body);

            // MAIL CONTENT 
            $mail_content = [
                'title'     => $tmp->title,
                'body'      => $tmp->body,
                'hospital'  => $request->hospital,
            ];
            $mail_sent = Mail::to($request->email_id)->send(new SendMail($mail_content));
            return back()->with('mail_sent', "The mail sent to ".$request->email_id);
            
        }else{
            return back()->with('failed','Failed To Send Mail');
        }

        

        
    }
}
