<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role=='user')
            $created=Appointment::orderBy('appointment_time','desc')->where('user_id',Auth::user()->id)->get();

        else{
            $created=Appointment::orderBy('appointment_time','desc')->where('admin_id',Auth::user()->id)->get();
        }

        return view('home',['createdappointments' => $created]);
    }

}
