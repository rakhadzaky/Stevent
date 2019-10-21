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
            <div class="card mt-12">    
                <div class="card">
                    <div class='row'>
                        <div class="col-sm-3">
                            <img class="card-img-top" src="{{ asset('img/event/timthumb.png') }}" alt="Card image" style="width:100%">
                        </div>
                        <div class="col-sm-6">
                            <p><a href="#" style="text-decoration: none; color: black; font-size:25px;" class="Stev-card-title">Judul event disini </a> <span class="Stev-ticket-status-confirmed">Confirmed</span></p>
                            <p class="card-text">
                                <span style="color:#ED4C67;"><i class="fa fa-map-marker" style="font-size:24px; margin-top:-30;"></i> Location </span><br>
                                alamat lengkap blablablablablablablablablabalbla
                            </p>
                                         
                        </div>
                            <div class="col-sm-3">
                                <div class="Stev-ticket-jadwal">
                                    <p class="card-text">
                                        Sunday <br>
                                        <div class="Stev-ticket-jadwal-tanggal">10</div>
                                        <span style="margin-top:-20;">Sept 2019</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class='row'>
                        <div class="col-sm-3">
                            <img class="card-img-top" src="{{ asset('img/event/images.jpg') }}" alt="Card image" style="width:100%">
                        </div>
                        <div class="col-sm-6">
                            <p><a href="#" style="text-decoration: none; color: black; font-size:25px;" class="Stev-card-title">Judul event disini </a> <span class="Stev-ticket-status-pending">Pending</span></p>
                            <p class="card-text">
                                <span style="color:#ED4C67;"><i class="fa fa-map-marker" style="font-size:24px; margin-top:-30;"></i> Location </span><br>
                                alamat lengkap blablablablablablablablablabalbla
                            </p>
                                         
                        </div>
                            <div class="col-sm-3">
                                <div class="Stev-ticket-jadwal">
                                        <p class="card-text">
                                            Sunday <br>
                                            <div class="Stev-ticket-jadwal-tanggal">10</div>
                                            <span style="margin-top:-20;">Sept 2019</span>
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
