@extends('layouts.app')

@section('content')
<div class="row pt-3">
    @include('admin.layouts.sidebar')
    <div class="col-md-10 offset-2 Stev-dashboard-content row">
        <div class="Stev-event offset-2 px-3">
            <div class="container">
                <div class="Stev-event-content row">
                    <div class="col-md-3">
                        <img src="{{ asset('img/event') }}/{{$event->sampul}}" alt="" class="w-100">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="font-weight-bold">{{$event->judul}} <button type="button" class="btn" data-toggle="modal" data-target="#JudulModal"><span class="fa fa-edit text-info"></span></button></h2>
                                <div class="Stev-Tag-box">Technology</div>
                                <div class="Stev-Tag-box" data-toggle="modal" data-target="#LocationModal"><span class="fa fa-plus"></span></div>
                                <div class="py-2">
                                    <h4>
                                        <span class="fa fa-heart text-danger"></span> <small class="ml-1 mr-2">1,5K</small>
                                        <span class="fa fa-share"></span> <small class="ml-1 mr-2">800</small>
                                        <span class="fa fa-comments"></span> <small class="ml-1 mr-2">20</small>
                                    </h4>
                                </div>
                                <div class="text-secondary">By {{$event->name}}</div>
                                <p class=mt-3>
                                    {{$event->tempat}}, {{$event->provinsi}}
                                    <button type="button" class="btn" data-toggle="modal" data-target="#LocationModal"><span class="fa fa-edit text-info"></span></button>
                                </p>
                                <br>
                            </div>
                            <div class="col-sm-6 align-right" style="color : #FF7D05">
                                <div class="float-right">
                                    <?php $hari = date('D',strtotime($event->jadwal)); ?>
                                    <?php $jadwal = date('d M Y',strtotime($event->jadwal)); ?>
                                    <?php $waktu = date('H.i',strtotime($event->jadwal)); ?>
                                    <h2>{{$hari}},</h2>
                                    <div>{{$jadwal}}</div>
                                    <div><small>{{$waktu}} - Selesai</small></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4>10 of 50 <small class="text-primary">Seats</small></h4>
                            </div>
                            <div class="col-sm-6">
                                @if($event->harga > 0)
                                    <?php $price = number_format($event->harga,2,',','.'); ?>
                                    <h3 class="float-right font-weight-light"><button type="button" class="btn" data-toggle="modal" data-target="#PriceModal"><span class="fa fa-edit text-info"></span></button> Rp{{$price}}</h3>
                                @else
                                    <h3 class="float-right font-weight-light"><button type="button" class="btn" data-toggle="modal" data-target="#PriceModal"><span class="fa fa-edit text-info"></span></button> Free to Enter</h3>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="float-right">
                            <button class="btn btn-primary px-5" onClick="sweetInfo()">Detail Tickets</button>
                            <!-- <button class="btn btn-warning px-5" onClick="sweetOk()">Edit Data</button> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-4">
                <div class="Stev-event-content row">
                    <div class="Stev-event-description-box w-100">
                        <div class="Stev-event-description-menu">
                            <div><span class="fa fa-align-left mr-1"></span> Description</div>
                            <div class="float-right">
                                <button type="button" class="btn" data-toggle="modal" data-target="#DescModal"><span class="fa fa-edit text-info"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 px-3">{!! $event->deskripsi !!}</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection