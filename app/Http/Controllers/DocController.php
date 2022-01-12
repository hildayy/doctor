<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\MedicalHistory;
use Carbon\Carbon;
use App\Models\user;
use Illuminate\Support\Facades\Auth;


class DocController extends Controller
{
    
    //
    public function all_appointment()
    {
        $appointments=Appointment::where( 'docname','=',Auth::user()->name)->get();
        
       
        return view('doctor.allAppointments',compact('appointments'));
    }

    public function future_appointments()
    {
        $appointments=Appointment::all();
        $date = Carbon::now();
        $currentdate=$date->toDateString();
        // var_dump($currentdate);
        // die();
       
        $data=Appointment::where('appointmentdate','>',Carbon::today()->toDateString())->where( 'docname','=',Auth::user()->name) ->get();
        // var_dump($appointments);
        // die();
        return view('doctor.futureappointments',compact('data'));
    }

    public function today_appointments()
    {
        $appointments=Appointment::all();
        $date = Carbon::now();
        $currentdate=$date->toDateString();
        // var_dump($currentdate);
        // die();
       
        $data=Appointment::where('appointmentdate','=',Carbon::today()->toDateString())->where( 'docname','=',Auth::user()->name) ->get();
        // var_dump($appointments);
        // die();
        return view('doctor.todayAppointments',compact('data'));
    }

    public function attend_to($id)
    {
        $data=appointment::find($id);
        
        return view('doctor.Attend_to',compact('data'));
    }
   
    public function addHistory(Request $request, $id)
    {
        $medicalHistory=new MedicalHistory;
       
        
        $medicalHistory->user_id=$request->user_id;
        $medicalHistory->pname=$request->pname;
        $medicalHistory->pemail=$request->pemail;
        $medicalHistory->phone=$request->phone;
        $medicalHistory->signsymptoms=$request->signsymptoms;
        $medicalHistory->Diagnosis=$request->Diagnosis;
        $medicalHistory->Prescription=$request->Prescription;
        $medicalHistory->Notes=$request->Notes;
        $medicalHistory->Fees=$request->Fees;
        $medicalHistory->docname=$request->docname;

        $medicalHistory->save();
        $data=appointment::find($id);
        $data->status='done';
        $data->save();

        return redirect()->back()->with('message','Medical record added successfully!!');
   
    }

    public function view_history($user_id)
    {
        $data=MedicalHistory::where('user_id','=',$user_id)->get();
        // var_dump($data);
        // die();
        
        return view('doctor.patientHistory',compact('data'));
       
    }

    public function allPatients()
    {
        $data=user::where('usertype','=',0)->get();
        return view('doctor.allPatients',compact('data'));
    }

}
