@extends('../layouts.app')

@section('content')
<div class="row pt-3">
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
        <div class="col-md-12 card mt-2" style="background-color:white">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>Tanggal Pembelian</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </tr>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{{$ticket->id_event}}</td>
                    <td>{{$ticket->created_at}}</td>
                    <td>{{$ticket->payment_status}}</td>
                    <td><button class="btn btn-primary">Confirm</button></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection