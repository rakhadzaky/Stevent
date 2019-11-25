@extends('../layouts.app')

@section('content')
<div class="pt-3">
    @include('organizers.layouts.sidebar')
    <div class="col-md-10 offset-2 Stev-dashboard-content row pr-4">
        <div class="col-md-4 card mt-5" style="background-color:white">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <span class="fa fa-ticket p-3" style="font-size:48pt"></span>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <span style="font-size:24pt">10 of 50</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 card mt-5" style="background-color:white">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <span class="fa fa-check p-3" style="font-size:48pt"></span>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <span style="font-size:24pt">10 of 50</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 card mt-5" style="background-color:white">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <span class="fa fa-hourglass-half p-3" style="font-size:48pt"></span>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <span style="font-size:24pt">10 of 50</span>
                </div>
            </div>
        </div>
        <!-- <div class="row"> -->
            <div class="col-md-6 card mt-2" style="background-color:white">
                <h4 class="p-3">Daftar Pembeli</h4>
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>Tanggal Pembelian</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                    @foreach($tickets as $ticket)
                    @if($ticket->payment_status != 'checkIn')
                    <tr>
                        <td>{{$ticket->name}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td>{{$ticket->payment_status}}</td>
                        <td>
                        @if($ticket->payment_status == 'pending')
                        <form action="{{route('organizers.confirm.ticket',['id_event' => $event->id_event])}}" method="post">
                            @csrf
                            <input type="hidden" name="id_ticket" value="{{$ticket->ticket_id}}">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-thumbs-up"></span> Confirm</button>
                        </form>
                        @elseif($ticket->payment_status == 'confirmed')
                        <form action="{{route('organizers.check.ticket',['id_event' => $event->id_event])}}" method="post">
                            @csrf
                            <input type="hidden" name="id_ticket" value="{{$ticket->ticket_id}}">
                            <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Check-In</button>
                        </form>
                        @endif
                        
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
            <div class="col-md-6 card mt-2" style="background-color:white">
                <h4 class="p-3">Daftar Hadir</h4>
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>Tanggal Pembelian</td>
                        <td>Status</td>
                        <!-- <td>Aksi</td> -->
                    </tr>
                    @foreach($tickets as $ticket)
                    @if($ticket->payment_status == 'checkIn')
                    <tr>
                        <td>{{$ticket->name}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td class="text-success">{{$ticket->payment_status}}</td>
                        <!-- <td>
                        @if($ticket->payment_status == 'pending')
                        <form action="{{route('organizers.confirm.ticket',['id_event' => $event->id_event])}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$ticket->ticket_id}}">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-thumbs-up"></span> Confirm</button>
                        </form>
                        @elseif($ticket->payment_status == 'confirmed')
                        <form action="{{route('organizers.confirm.ticket',['id_event' => $event->id_event])}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$ticket->ticket_id}}">
                            <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Check-In</button>
                        </form>
                        @endif
                        
                        </td> -->
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        <!-- </div> -->
    </div>
</div>
@endsection