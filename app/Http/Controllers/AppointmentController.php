<?php


namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    private $appointment;
    public function __construct()
    {
        $this->middleware('auth');
        $this->appointment=new Appointment();
    }
    public function store(){

        $Time=request('time');
        if(isset($Time))

            $found=Appointment::where('admin_id',Auth::user()->id)->where('appointment_time',$Time)->first();

        if(!isset($found->id)) {
            $draw = [
                'appointment_time' => $this->appointment->appointment_time = $Time,
                'admin_id' => $this->appointment->admin_id = Auth::user()->id,
                'created_at' => $this->appointment->created_at = now()
            ];

            DB::table('appointments')->insert($draw);
        }


        return redirect('/createAppointment');





    }
    public function create(){
        $date=date('Y-m-d H:i:s');
        $created=Appointment::where('admin_id',Auth::user()->id)->where('appointment_time','>',$date)->get();

        return view('createAppointment',['createdappointments' => $created]);
    }
    public function select(){


        $created=Appointment::get();

        return view('slotBooking',['createdappointments' => $created]);

    }
    public function confirm(){
        $name=request('name');
        $profession=request('profession');
        $created=User::where('name',$name)->where('profession',$profession)->first();
        $date=date('Y-m-d H:i:s');
        if($created){
            $created=Appointment::where('admin_id',$created->id)->where('appointment_time','>',$date)->get();

            return view('confirmAppointment',['createdappointments' => $created]);}
        else
            return redirect('/slotBooking')->with('message','No '.$name.' Found');

    }
    public function confirmed(){
        $id=request('id');
        $user_id=request('user_id');

        $this->appointment->where('id',$id)->update(['user_id' =>$user_id ]);
        return redirect('home');



    }
}