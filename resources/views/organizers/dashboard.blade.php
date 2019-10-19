@extends('../layouts.app')

@section('content')
<div class="row pt-5">
    <div class="col-md-2 Stev-dashboard-menu">
        <div class="mt-5">
            <div class="button-menu">
                <span class="fa fa-home"></span> Home
            </div>
            <div class="button-menu">
                <span class="fa fa-ticket"></span> Home
            </div>
            <div class="button-menu">
                <span class="fa fa-cog"></span> Settings
            </div>
        </div>        
    </div>
    <div class="col-md-10 offset-2 Stev-dashboard-content">
        <img src="{{ asset('img/event/download.jpg') }}" class="cover" alt="">
        <div class="cover-black"></div>
        <div class="title-box">
            <h2>Comic Con LA</h2>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <p>Sun, 10 Sept 2019
                    <br>Telkom University Convention Hall, Telkom University Dayeuhkolot, Kab. Bandung 43211</p>
                </div>
                <div class="col-sm-6">
                    <h4 style="text-align: right; margin-top:30px;">Free to Enter</h4>
                </div>
            </div>
        </div>
        <div class="time-section">
            <span class="time-number">10</span><span class="time-unit">days</span>
            <span class="time-number">5</span><span class="time-unit">Hours</span>
            <span class="time-number">30</span><span class="time-unit">Minutes</span>
            <span class="time-number">24</span><span class="time-unit">Seconds</span>
        </div>
        <div class="rom">
            <div class="col-sm-6 row" style="text-align:center">
                <div class="col-sm-6 left-side">
                    test
                </div>
            </div>
        </div>
    </div>
</div>
@endsection