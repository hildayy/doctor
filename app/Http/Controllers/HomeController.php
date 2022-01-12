<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\MedicalHistory;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor=doctor::all();


                return view('user.home',compact('doctor'));
            }
            else if(Auth::user()->usertype=='1')
            {
                $pcount = User::where('usertype','=','0')->count();
                $acount = Appointment::all()->count();
                $dcount = Doctor::all()->count();
                $donecount = Appointment::where('status','=','done')->count();                
                return view('admin.home')->with('pcount',$pcount)->with('acount',$acount)->with('dcount',$dcount)->with('donecount',$donecount);
            }
            else
            {
                $docdetails=doctor::where( 'docname','=',Auth::user()->name)->get();
                $patients=user::where('usertype','=',0)->count();
                $appointments=Appointment::where( 'docname','=',Auth::user()->name)->count();
                $todayAPP=Appointment::where('appointmentdate','=',Carbon::today()->toDateString())->where( 'docname','=',Auth::user()->name) ->count();
                $data=MedicalHistory::where('docname','=',Auth::user()->name)->sum('Fees');
                
                return view('doctor.home',compact('docdetails'))->with('pcount',$patients)->with('appointments',$appointments)->with('todayAPP',$todayAPP)->with('fees',$data);
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else{
            $doctor=doctor::all();
            return view('user.home',compact('doctor'));
        }
    }

    public function addAppointment(Request $request)
    {
        $data=new appointment();
        $data->patientname=$request->patientname;
        $data->patientEmail=$request->patientEmail;
        $data->appointmentDate=$request->appointmentDate;
        $data->docname=$request->docname;
        $data->patientPhone=$request->patientPhone;
        $data->message=$request->message;
        $data->status='In progress';
        
        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Appointment Request was sucessful, will contact you as soon as possible');

    }

    public function myAppointments()
    {
        if(Auth::id())
        {
            $userid=Auth::user()->id;
            
            $appoint=appointment::where('user_id',$userid)->get();
        //     var_dump($appoint);
        // die();
    
            return view('user.myappointments',compact('appoint'));
        }
        else
        {
            return redirect()->back();
        }

        
    }
    public function allDocs()
    {
        $doctor=doctor::all();
            return view('user.alldocs',compact('doctor'));
    }
    public function cancel_appoint($id)
    {
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function myHistory()
    {
        $data=MedicalHistory::where('user_id','=',Auth::user()->id)->get();
        // var_dump($data);
        // die();
        
        return view('user.myHistory',compact('data'));
    }


}
