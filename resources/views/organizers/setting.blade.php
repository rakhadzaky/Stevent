@extends('../layouts.app')

@section('content')
<div class="row pt-3">
    @include('organizers.layouts.sidebar')
    <div class="col-md-10 offset-2 Stev-dashboard-content row">
        <div class="col-md-10 offset-1 card mt-5" style="background-color:white">
            <div class="row px-2 pt-4">
                <div class="col-sm-8">
                    <p class="mt-1"><b>Delete this Event</b><br>Event will be permanently deleted.</p>
                </div>
                <div class="col-sm-4">
                    <span class="float-right">
                        <a href="{{route('organizers.delete',['id_event' => $event->id_event])}}"><button class="btn btn-outline-danger">Delete</button></a>
                    </span>
                </div>
            </div>
            <hr>
            <div class="row p-2">
                <div class="col-sm-8">
                    <p class="mt-1"><b>Change Ownership</b><br>All the previllage for the event will be transferred to another user.</p>
                </div>
                <div class="col-sm-4">
                    <span class="float-right">
                        <a href="{{route('organizers.create.three',['id_event' => $event->id_event])}}"><button class="btn btn-outline-secondary">Change</button></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection