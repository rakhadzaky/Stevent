@extends('layouts.app')

@section('content')
<div class="container py-4">
    
            <div class="mt-12 pt-5">

                @foreach($tickets as $ticket)
                <div class="card" style="background-color: #fff">
                    <div class='row'>
                        <div class="col-md-3">
                            <img class="card-img-top" src="{{ asset('img/event') }}/{{$ticket->sampul}}" alt="Card image" style="height:100%">
                        </div>
                        <div class="col-md-9 row">
                            <div class="col-md-8 p-2">
                                <p><a href="#" style="text-decoration: none; color: black; font-size:25px;" class="Stev-card-title">{{$ticket->judul}}</a>
                                @if($ticket->payment_status == "pending")
                                    <span class="Stev-ticket-status-pending">{{$ticket->payment_status}}</span>
                                @else
                                    <span class="Stev-ticket-status-confirmed">{{$ticket->payment_status}}</span>
                                @endif
                                <br>
                                    <b>Location </b><br>
                                    {{$ticket->tempat}}, {{$ticket->provinsi}}
                                </p>
                            </div>
                            <div class="col-md-4">
                                <div class="Stev-ticket-jadwal">
                                    <p>
                                        <?php $day_real = date('D',strtotime($ticket->jadwal)); ?>
                                        <?php $day = date('d',strtotime($ticket->jadwal)); ?>
                                        <?php $month_year = date('M Y',strtotime($ticket->jadwal)); ?>
                                        {{$day_real}} <br>
                                        <div class="Stev-ticket-jadwal-tanggal">{{$day}}</div>
                                        <span style="margin-top:-20;">{{$month_year}}</span>
                                    </p>
                                </div>
                            </div>
                            <span style="border:1px solid #e3e3e3" class="w-100"></span>
                            <div class="my-2 w-100">
                                <button class="btn btn-primary float-right ml-3">Detail</button>
                                <a href="{{route('deleteTicket',['id_ticket' => $ticket->ticket_id])}}"><button class="btn btn-danger float-right">Delete</button></a>
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
