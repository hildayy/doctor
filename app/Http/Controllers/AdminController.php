<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\user;

use Notification;
use App\Notifications\sendMailNotification;
use Illuminate\Notifications\Notification as NotificationsNotification;

class AdminController extends Controller
{
    //
    public function addDocView()
    {
        return view('admin.addDoctor');
    }
    public function registerdoc($id)
    {
        $data= user::find($id);
        return view('admin.registerdoc',compact('data'));
    }

    public function uploadDoc(Request $request)
    {
        $doctor=new doctor;
        $image=$request->docpic;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->docpic->move('doctorimage',$imagename);
        $doctor->docpic=$imagename;
        $doctor->docname=$request->docname;
        $doctor->docphone=$request->docphone;
        $doctor->docmail=$request->docmail;
        $doctor->speciality=$request->speciality;

        $doctor->save();
        return redirect()->back()->with('message','Doctor added successfully!!');
   
    }
    public function ruploadDoc(Request $request,$id)
    {
        $doctor=new doctor;
        $image=$request->docpic;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->docpic->move('doctorimage',$imagename);
        $doctor->docpic=$imagename;
        $doctor->docname=$request->docname;
        $doctor->docphone=$request->docphone;
        $doctor->docmail=$request->docmail;
        $doctor->speciality=$request->speciality;

        $doctor->save();
        $data= user::find($id);
        $data->docstatus='1';
        $data->save();
   
        return view('admin.unregistered')->with('message','Doctor added successfully!!');
        
    }

    public function show_appointment()
    {
        $appointments=Appointment::all();
       return view('admin.showAppointment',compact('appointments')); 
    }

    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }

    public function canceled($id)
    {
        $data=appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }

    public function show_doctors()
    {
        $doctors=doctor::all();
       return view('admin.showdoctors',compact('doctors')); 
    }
    public function unregistered()
    {
        // $unregistered=user::where('docstatus', '=',' 2')->get();
        $unregistered=user::where('usertype','=',2)->where('docstatus','=',0)->get();
      
        return view('admin.unregistered',compact('unregistered'));  
    }

    public function deleteDoc($id)
    {
        $doctor=doctor::find($id);
        $doctor->delete();
        return redirect()->back();

    }

    public function updateDoc($id)
    {
        $data= doctor::find($id);
        return view('admin.update_doc',compact('data'));
    }

    public function editdoc($id, Request $request)
    {
        $doctor=doctor::find($id);
        $doctor->docname=$request->docname;
        $doctor->docphone=$request->docphone;
        $doctor->speciality=$request->speciality;

        $image=$request->docpic;
        if($image)
        {
            $imagename=time().'.'.$image->getClientoriginalExtension();
             $request->docpic->move('doctorimage',$imagename);
            $doctor->docpic=$imagename;
        }     

        $doctor->save();
        return redirect()->back()->with('message','Doctor Updated successfully!');

    }
    public function MailView($id)
    {
        $data=appointment::find($id);
        return view('admin.MailView',compact('data'));
    }
    public function sendmail(Request $request, $id){
        $data=appointment::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'body'=>$request->body,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart


        ];
        
        Notification::send($data,new sendMailNotification($details));

        return redirect()->back();
    }

}
