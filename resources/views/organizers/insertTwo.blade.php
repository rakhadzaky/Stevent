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
                <form action="" class="mt-5">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <table>
                            <tr>
                                <td>
                                    <input type="checkbox" name="kategori" id="kategori" class="" value="Technology"> Technology
                                </td>
                                <td>
                                    <input type="checkbox" name="kategori" id="kategori" class="" value="Website"> Website
                                </td>
                                <td>
                                    <input type="checkbox" name="kategori" id="kategori" class="" value="Design"> Design
                                </td>
                            </tr>
                            <tr>
                            <td>
                                <input type="checkbox" name="kategori" id="kategori" class="" value="Festival"> Festival
                            </td>
                            <td>
                                <input type="checkbox" name="kategori" id="kategori" class="" value="Concert"> Concert
                            </td>
                            <td>
                                <input type="checkbox" name="kategori" id="kategori" class="" value="Seminar"> Seminar
                            </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" name="tempat" id="tempat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control">
                    </div>
                    <button class="btn form-control Stev-button">Next</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection