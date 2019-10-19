@extends('layouts.app')

@section('content')
<div class="Stev-event-background">
    <div class="cover"></div>
    <img src="{{ asset('img/event/timthumb.png') }}" alt="">
</div>

<!-- <div class="Stev-event-modal-cover" id="cover-modal"></div>
<div class="Stev-event-modal col-md-4 offset-4" id="content-modal">
    <div class="Stev-event-modal-background">
        <img src="{{ asset('img/event/timthumb.png') }}" alt="">
    </div>
    <div class="Stev-event-modal-content pb-4">
        <h2>{{$events->judul}}</h2>
        <h6 class="Stev-event-header-content mt-1"><span class="fa fa-calendar" aria-hidden="true"></span> Date Time</h6>
        <p>{{$events->created_at}}</p>
        <h6 class="Stev-event-header-content mt-1"><span class="fa fa-map-marker" aria-hidden="true"></span> Location</h6>
        <p>{{$events->tempat}}</p>
        <h6 class="Stev-event-header-content mt-1"><span class="fa fa-align-left" aria-hidden="true"></span> Description</h6>
        <p>{{$events->deskripsi}}</p>
        <button class="btn Stev-event-modal-button form-control">Pesan</button>
    </div>
</div> -->

<div class="Stev-event">
    <div class="Stev-event-content">
        <div class="container">
            <h1 class="Stev-event-title">{{$events->judul}}</h1>
            <span class="Stev-event-title float-right pt-3"><h4>Free to enter</h4></span>
            <div class="row">

                <div class="col-md-8">
                    <div class="card mt-4">    
                        <div class="card">
                            <div class="card-body">
                                <h5 class="Stev-event-header-content"><span class="fa fa-map-marker" aria-hidden="true"></span> Location</h5>
                                <p>{{$events->tempat}}</p>
                                <h5 class="Stev-event-header-content"><span class="fa fa-align-left" aria-hidden="true"></span> Description</h5>
                                <p>{{$events->deskripsi}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-4">    
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-md-4">
                                    <div class="Stev-event-content-date-container"><i class="fa fa-calendar Stev-event-content-date-icon" aria-hidden="true"></i></div>
                                </div>
                                <div class="col-md-8">
                                    <h2>Sunday,</h2>
                                    <p>{{$events->created_at}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">    
                        <div class="card Stev-event-content-order">
                            <div class="card-body row p-4">
                                <button id="pesan" class="btn btn-light form-control">Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection