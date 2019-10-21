@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center py-4">
        <div class="col-md-8 mb-4 py-4">
            <p>Search Event</p>
                <form action="" method="POST" class="row">
                    
                    <div class="col-md-10">
                        <input type="text" name="search" class="form-control Stev-form-control" placholder="Search" value="">
                    </div>
                    <div class="col-md-2">
                        <button class="btn Stev-Button-Search px-4">Search</button>
                    </div>
                </form>
        </div>
        <div class="container mt-4">
            <div class="row mt-4">
                <div class="col-md-7">
                    <h4 class="Stev-header">Result</h4>
                </div>
                <div class="col-md-5 row">
                    <div class="col-md-5">
                        <select name="" class="form-control Stev-form-control" id="">
                            <option value="" selected disabled>Cateogry</option>
                            <option value="">Technology</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="" class="form-control Stev-form-control" id="">
                            <option value="" selected disabled>Day</option>
                            <option value="">Technology</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="" class="form-control Stev-form-control" id="">
                            <option value="" selected disabled>Month</option>
                            <option value="">Technology</option>
                        </select>
                    </div>
                </div>
            </div>

            <br>
            <div class="mt-12">

                @foreach($tickets as $ticket)
                <div class="card">
                    <div class='row'>
                        <div class="col-sm-3">
                            <img class="card-img-top" src="{{ asset('img/event') }}/{{$ticket->sampul}}" alt="Card image" style="width:100%">
                        </div>
                        <div class="col-sm-6">
                            <p><a href="#" style="text-decoration: none; color: black; font-size:25px;" class="Stev-card-title">{{$ticket->judul}}</a>
                            @if($ticket->payment_status == 0)
                                <span class="Stev-ticket-status-pending">Pending</span></p>
                            @else
                                <span class="Stev-ticket-status-confirmed">Confirmed</span></p>
                            @endif
                            <p class="card-text">
                                <span style="color:#ED4C67;"><i class="fa fa-map-marker" style="font-size:24px; margin-top:-30;"></i> Location </span><br>
                                alamat lengkap blablablablablablablablablabalbla
                            </p>
                                         
                        </div>
                            <div class="col-sm-3">
                                <div class="Stev-ticket-jadwal">
                                    <p class="card-text">
                                        <?php $day_real = date('D',strtotime($ticket->jadwal)); ?>
                                        <?php $day = date('d',strtotime($ticket->jadwal)); ?>
                                        <?php $month_year = date('M Y',strtotime($ticket->jadwal)); ?>
                                        {{$day_real}} <br>
                                        <div class="Stev-ticket-jadwal-tanggal">{{$day}}</div>
                                        <span style="margin-top:-20;">{{$month_year}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <br>
                @endforeach

            </div>
            
        </div>
    </div>
</div>
@endsection
