@extends('../layouts.app')

@section('content')
<div class="col-md-10 offset-2 pt-5">
    <ul class="Stev-progressBar pt-5">
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
                <form action="{{route('organizers.store.three',['id_event'=>$id_event])}}" class="mt-5" method="post" enctype="multipart/form-data">
                    @csrf
                <br><br>
                    <input type="hidden" name="id_event" value="{{$id_event}}">
                    <label for="file_cover" class="Stev-input-file"><img class="card-img-top" src="{{ asset('img/upload.png') }}" alt="Card image" style="width:100%; margin-top:-12%"></label>
                    <input type="file" style="width:1px; height:1px;" name="file_cover" id="file_cover" onChange="changeInput()">
                    <p id="value-file"></p>
                    <button type="submit" class="btn form-control Stev-button">Next</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function changeInput(){
        console.log(document.getElementById('poster').value)
    }
</script>
@endsection