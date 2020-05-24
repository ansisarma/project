@extends('layouts.app')

@section('content')
    @if(auth()->user()->role=='user')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Appointment') }}<a href="/home" class="btn btn-primary mb-2 " style="float:right;">All Appointments</a></div>

                        <div class="card-body">
                            <form method="POST" action="/confirmAppointment">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control"  name="name" required autocomplete="new-password">


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Profession') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control"  name="profession" required autocomplete="new-password">


                                    </div>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Search Slots') }}
                                        </button>
                                    </div>
                                </div>




                            </form>
                        </div>
                        @else
                            <script type="text/javascript">
                                window.location.href= "home";</script>

    @endif
@endsection