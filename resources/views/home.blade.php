@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard  @if(auth::user()->role=='user')<a href="/slotBooking" class="btn btn-primary mb-2 " style="float:right;">Book Appointment</a>@else <a href="/createAppointment" class="btn btn-primary mb-2 " style="float:right;">Create Slots</a>@endif</div>
                @foreach($createdappointments as $createdappointment)


                    @if(auth()->user()->role=='user')
                        <div class="card my-3 " style="">
                            <div class="card-body">
                            <div class="card-body">
                    <h5 class="card-title text-center">Appointment </h5>
                    <p class="card-text"> Name :{{$name=App\User::where('id',$createdappointment->admin_id)->get()->pluck('name')->first()}}</p>
                            <p class="card-text"> Profession :{{$name=App\User::where('id',$createdappointment->admin_id)->get()->pluck('profession')->first()}}</p>
                                <p class="card-text"> Time:{{$createdappointment->appointment_time}} </p></div>
                            </div>
                        </div>
                    @else
                           <input value="{{$name=App\User::where('id',$createdappointment->user_id)->get()->pluck('name')->first()}}" hidden>

                    @isset($name)<div class="card my-3 " style="">
                                            <div class="card-body">
                            <div class="card-body">
                        <h5 class="card-title text-center">Appointment </h5>
                        <p class="card-text"> Name :{{$name=App\User::where('id',$createdappointment->user_id)->get()->pluck('name')->first()}}</p>
                                <p class="card-text"> Time:{{$createdappointment->appointment_time}} </p></div></div>
                        </div>
                        @endif

                    @endisset
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
