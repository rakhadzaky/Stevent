@extends('../layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row pt-5">
        <div class="col-md-7">
            <h4 class="Stev-header">Create Event</h4>
        </div>
    </div>
</div>
<div class="col-md-10 offset-2">
    <ul class="Stev-progressBar">
        <li class="active">Test</li>
        <li class="active">Test</li>
        <li>Test</li>
    </ul>
</div>
<br>
<br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-3 card mb-5">
            <div class="card-body">
                <h2 class="text-center" style="color: #ED4C67">Data Event</h2>
                <form action="" class="mt-5">
                    <div class="form-group">
                        <label for="poster"></label>
                        <a href="#"><img class="card-img-top" src="{{ asset('img/upload.png') }}" alt="Card image" style="width:100%; margin-top:-12%"></a>
                    </div>
                    <button class="btn form-control Stev-button">Next</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection