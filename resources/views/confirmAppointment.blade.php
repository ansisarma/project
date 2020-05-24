@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    @foreach($createdappointments as $createdappointment)

                    <div class="card-body">
                        @if(!isset($createdappointment->user_id))
                        <h5 class="card-title text-center">Appointment </h5>
                        <p class="card-text"> Name :{{$name=App\User::where('id',$createdappointment->admin_id)->get()->pluck('name')->first()}}</p>
                        <p class="card-text"> Time:{{$createdappointment->appointment_time}} </p>

                        <form action="/confirmedAppointment" method="post">
                                @csrf
                            <input type="text" name="user_id" id="confirm" value="{{auth()->user()->id}}" hidden>
                            <input type="text" name="id" value="{{$createdappointment->id}}" hidden>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm Appointment') }}
                            </button>
                        </form>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
