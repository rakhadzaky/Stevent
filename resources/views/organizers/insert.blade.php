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
        <li>Test</li>
        <li>Test</li>
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
                <form action="{{ route('organizers.store.one') }}" class="mt-5" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn form-control Stev-button">Next</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection