@extends('../layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row pt-5">
        <div class="col-md-7">
            <h4 class="Stev-header">Your Events</h4>
        </div>
        <div class="col-md-5 row">
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        @foreach ($events as $events)
        <a href="{{route('organizers.dashboard')}}" class="col-md-3 Stev-organizers-create-event">
            <img src="{{ asset('img/event/download.jpg') }}" alt="">
            <span class="Stev-organizers-create-event-cover"></span><br>
            <span class="Stev-organizers-create-event-title">{{$events->judul}}</span>
        </a>
        @endforeach
        <a href="{{route('organizers.create.one')}}" style="text-decoration: none" class="col-md-3 Stev-organizers-create-event">
            <img src="{{ asset('img/ca7b903624147cd0634f5fbbeeeeed98.jpg') }}" alt="">
            <span class="Stev-organizers-create-event-cover"></span>
            <span class="Stev-organizers-create-event-plus"><i class="fa fa-plus"></i></span><br>
            <span class="Stev-organizers-create-event-newEvent">New Event</span>
        </a>
    </div>
</div>
@endsection