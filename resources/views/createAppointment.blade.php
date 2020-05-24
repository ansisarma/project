@extends('layouts.app')

@section('content')
    @if(auth()->user()->role=='admin')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create Appoitment Schedule<a href="/home" class="btn btn-primary mb-2 " style="float:right;">Go Back</a></div></div>

                    <div class="card-body">
                        <div>
                            Previously created Appointments <br>
                            @foreach($createdappointments as $createdappointment)
                                <input type="checkbox" name="time" value="{{$createdappointment->appointment_time}}")
                                       checked disabled="disabled" >{{$createdappointment->appointment_time}}<br>
                            @endforeach
                            <hr></div>
                        <div class="card-body">
                            <form action="/createAppointment" method="post">
                                @csrf
                                <input type="datetime-local" id="meeting-time"
                                       name="time"
                                >

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Slot') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        <script type="text/javascript">
            window.location.href= "home";
        </script>
    @endif
@endsection