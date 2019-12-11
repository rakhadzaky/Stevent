@extends('layouts.app')

@section('content')
<div class="row pt-3">
    @include('admin.layouts.sidebar')
    <div class="col-md-10 offset-2 Stev-dashboard-content row">
        <div class="col-md-11 card mt-5" style="background-color:white">
            <table class="table table-striped table-borderless">
                <thead>
                    <th>Nama Event</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Tanggal Acara</th>
                    <th>Owner</th>
                    <th>Status</th>
                    <th>Detail</th>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr class="align-self-center">
                        <td>{{$event->judul}}</td>
                        <td>{{$event->created_at}}</td>
                        <td>{{$event->jadwal}}</td>
                        <td>{{$event->name}}</td>
                        <td>{{$event->status}}</td>
                        <td>
                            <button class="btn btn-danger"><span class="fa fa-trash"></span></button>
                            <button class="btn btn-secondary"><span class="fa fa-list"></span></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection