<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Template;
use App\Models\Location;
use App\Models\Patient;
use App\Models\User;
use DB;


class SendMailController extends Controller
{

    // Send Mail
    public function sendMail($sender_id, $doctor_id){
        $sender = User::find($sender_id);
        $doctor = User::find($doctor_id);
        $location = Location::find($doctor->hospital_id);
        $tmp = Template::where('id','1')->first();

        if($tmp->body  == true){
            $tmp->body = str_replace("[[Full_name]]",$sender->username, $tmp->body);
            $tmp->body = str_replace("[[Location]]",$location->name.", ".$location->address, $tmp->body);
            $tmp->body = str_replace("[[Email]]",$location->email, $tmp->body);
            $tmp->body = str_replace("[[Phone]]",$location->phone, $tmp->body);

            // MAIL CONTENT 
            $mail_content = [
                'title'     => $tmp->title,
                'body'      => $tmp->body,
                'hospital'  => $location->name,
            ];
            
            // Mailing to...
            $mail_sent = Mail::to($sender->email)->send(new SendMail($mail_content));
            return back()->with('mail_sent', "The mail sent to ".$sender->email);
            
        }else{
            return back()->with('failed','E-Mail Template does not exists');
        }        
    }

    // Add template.
    public function addTmp(Request $request){
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

    // Send mail to user.
    public function sendMailToUser(Request $request){
        $location = Location::where('id',$request->hospital)->first();

        $tmp = Template::where('id','1')->first();

        // If email matches to patient otherwise get user's email.
        if(Patient::where("email" ,$request->email_id)->first() == true){
            $patient = Patient::where("email" ,$request->email_id)->first();
        }else{
            $patient = User::where("email" ,$request->email_id)->first();
        }

        if($tmp->body  == true){
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
            
            // Mailing to...
            $mail_sent = Mail::to($request->email_id)->send(new SendMail($mail_content));
            return back()->with('mail_sent', "The mail sent to ".$request->email_id);
            
        }else{
            return back()->with('failed','Failed To Send Mail');
        }        
    }



    public function addLetterTemplate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        
        
        $addTmp     =   Template::create([
            'title'     =>  $request->title,
            'body'      =>  $request->body    
        ]);

        if ($addTmp ==  true) {
            return redirect()->route('emailLetter')->with('added', 'Template Added Successfully');
        }else{
            return redirect()->route('emailLetter')->with('failed', 'Failed To Add Template');
        }
 
    }
}
