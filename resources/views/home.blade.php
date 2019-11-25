@extends('layouts.app')

@section('content')
<div class="Stev-filter-bar">
    <span class='Stev-filter-icon-filter fa fa-filter'></span>
    <select name="" class="Stev-filter-button" id="">
        <option value="" selected disabled>Cateogry</option>
        <option value="">Technology</option>
    </select>
    <select name="" class="Stev-filter-button" id="">
        <option value="" selected disabled>Day</option>
        <option value="">Technology</option>
    </select>
    <select name="" class="Stev-filter-button" id="">
        <option value="" selected disabled>Month</option>
        <option value="">Technology</option>
    </select>
</div>
<div class="py-1">
    <div class="justify-content-center">
        <div class="pl-2 pr-4">

            <div class="row">
                @foreach($events as $event)
                <div class="col-md-4">
                    <div class="card mt-4" style="min-height:300px;">
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="card-img-top Stev-img-card" src="{{ asset('img/event') }}/{{$event->sampul}}" alt="Card image" style="height:100%;">
                            </div>
                            <div class="col-sm-6 py-4" style="background-color: #F2F2F2;">
                                <p class="Stev-card-title">{{$event->judul}}</p>
                                <?php $jadwal = date('D, d-M-Y',strtotime($event->jadwal)); ?>
                                <?php $waktu = date('H:i',strtotime($event->jadwal)); ?>
                                <div class="row" style="color:#FF7D05">
                                    <div class="col-sm-3">
                                        <h1><span class="fa fa-calendar mb-2" aria-hidden="true"></span></h1>
                                    </div>
                                    <div class="col-sm-9">
                                        <span>{{$jadwal}}<br>{{$waktu}} - Selesai</span>
                                    </div>
                                </div>
                                <div class="Stev-card-paragraph">
                                    {!!$event->deskripsi!!}
                                </div>
                                <br>
                                <div class="Stev-Tag-box">Technology</div>
                                <a href="/event/{{$event->id_event}}"><button class="btn btn-primary form-control mt-3">Detail</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
