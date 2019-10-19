@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center py-4">
        <div class="col-md-8 mb-4 py-4">
            <p>Search Event</p>
                <form action="{{route('home.search')}}" method="POST" class="row">
                    @csrf
                    <div class="col-md-10">
                        <input type="text" name="search" class="form-control Stev-form-control" placholder="Search" value="{{$search}}">
                        @if ($search != "")
                            <a href="{{route('home')}}" class="text-danger" style="cursor:pointer"><div class="pt-2"><i class="fa fa-close"></i> Clear Search</div></a>
                        @endif
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

            <div class="row">
                @foreach($events as $event)
                <div class="col-md-4">
                    <div class="card mt-4">    
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('img/event/timthumb.png') }}" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <a href="/event/{{$event->id_event}}" style="text-decoration: none; color: black"><p class="Stev-card-title">{{$event->judul}}</p></a>
                                <div class="row">
                                    <div class="col-md-6 Stev-card-paragraph">
                                        <span class="fa fa-calendar mb-2" aria-hidden="true"></span> {{$event->created_at}}
                                        <br>
                                        <span class="fa fa-map-marker" aria-hidden="true"></span> {{$event->tempat}}
                                    </div>
                                    <div class="col-md-6 Stev-card-paragraph">
                                        <p>{{$event->deskripsi}}</p>
                                    </div>
                                </div>
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
