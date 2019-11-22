<div class="col-md-2 Stev-dashboard-menu">
    <div class="mt-5">
        <a href="{{route('organizers.dashboard',['id_event' => $event->id_event])}}" style="text-decoration:none;"><div class="button-menu">
            <span class="fa fa-home"></span> Home
        </div></a>
        <a href="{{route('organizers.ticket',['id_event' => $event->id_event])}}" style="text-decoration:none;"><div class="button-menu">
            <span class="fa fa-ticket"></span> Tickets
        </div></a>
        <a href="" style="text-decoration:none;"><div class="button-menu">
            <span class="fa fa-comments"></span> Comments
        </div></a>
        <a href="{{route('organizers.settings',['id_event' => $event->id_event])}}" style="text-decoration:none;"><div class="button-menu">
            <span class="fa fa-cog"></span> Settings
        </div></a>
    </div>        
</div>