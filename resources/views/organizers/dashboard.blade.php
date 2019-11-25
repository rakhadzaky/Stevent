@extends('../layouts.app')

@section('content')
<div class="row pt-3">
    @include('organizers.layouts.sidebar')
    <div class="Stev-event offset-2 px-3">
        <div class="container">
            <div class="Stev-event-content row">
                <div class="col-md-3">
                    <img src="{{ asset('img/event') }}/{{$event->sampul}}" alt="" class="w-100">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="font-weight-bold">{{$event->judul}} <button type="button" class="btn" data-toggle="modal" data-target="#JudulModal"><span class="fa fa-edit text-info"></span></button></h2>
                            <div class="Stev-Tag-box">Technology</div>
                            <div class="Stev-Tag-box" data-toggle="modal" data-target="#LocationModal"><span class="fa fa-plus"></span></div>
                            <div class="py-2">
                                <h4>
                                    <span class="fa fa-heart text-danger"></span> <small class="ml-1 mr-2">1,5K</small>
                                    <span class="fa fa-share"></span> <small class="ml-1 mr-2">800</small>
                                    <span class="fa fa-comments"></span> <small class="ml-1 mr-2">20</small>
                                </h4>
                            </div>
                            <div class="text-secondary">By {{$event->name}}</div>
                            <p class=mt-3>
                                {{$event->tempat}}, {{$event->provinsi}}
                                <button type="button" class="btn" data-toggle="modal" data-target="#LocationModal"><span class="fa fa-edit text-info"></span></button>
                            </p>
                            <br>
                        </div>
                        <div class="col-sm-6 align-right" style="color : #FF7D05">
                            <div class="float-right">
                                <?php $hari = date('D',strtotime($event->jadwal)); ?>
                                <?php $jadwal = date('d M Y',strtotime($event->jadwal)); ?>
                                <?php $waktu = date('H.i',strtotime($event->jadwal)); ?>
                                <h2>{{$hari}},</h2>
                                <div>{{$jadwal}}</div>
                                <div><small>{{$waktu}} - Selesai</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>10 of 50 <small class="text-primary">Seats</small></h4>
                        </div>
                        <div class="col-sm-6">
                            @if($event->harga > 0)
                                <?php $price = number_format($event->harga,2,',','.'); ?>
                                <h3 class="float-right font-weight-light"><button type="button" class="btn" data-toggle="modal" data-target="#PriceModal"><span class="fa fa-edit text-info"></span></button> Rp{{$price}}</h3>
                            @else
                                <h3 class="float-right font-weight-light"><button type="button" class="btn" data-toggle="modal" data-target="#PriceModal"><span class="fa fa-edit text-info"></span></button> Free to Enter</h3>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="float-right">
                        <button class="btn btn-primary px-5" onClick="sweetInfo()">Detail Tickets</button>
                        <!-- <button class="btn btn-warning px-5" onClick="sweetOk()">Edit Data</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-4">
            <div class="Stev-event-content row">
                <div class="Stev-event-description-box w-100">
                    <div class="Stev-event-description-menu">
                        <div><span class="fa fa-align-left mr-1"></span> Description</div>
                        <div class="float-right">
                            <button type="button" class="btn" data-toggle="modal" data-target="#DescModal"><span class="fa fa-edit text-info"></span></button>
                        </div>
                    </div>
                </div>
                <div class="mt-5 px-3">{!! $event->deskripsi !!}</div>
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="JudulModal">
    <div class="modal-dialog">
    <div class="modal-content" syle="z-index:100">
    
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Edit Judul</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="{{route('organizers.update.title')}}" method="post">
        @csrf
        <div class="modal-body">
            <input type="hidden" value="{{$event->id_event}}" name="change_title_id">
            <label for="changeJudul">New Title</label>
            <input type="text" id="changeJudul" name="changeJudul" class="form-control" value="{{$event->judul}}" require>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" onClick="sweetOk()">Edit</button>
        </div>
        </form>
        
    </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="LocationModal">
    <div class="modal-dialog">
    <div class="modal-content" syle="z-index:100">
    
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Edit Judul</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="{{route('organizers.update.location')}}" method="post">
        @csrf
        <div class="modal-body">
            <input type="hidden" value="{{$event->id_event}}" name="change_title_id">
            <div class="row">
                <div class="col-sm-6">
                    <!--provinsi-->
                        <select id="provin" class="form-control" name="provin">
                        <option disabled selected>Pilih Provinsi</option>
                            @foreach($provinces as $province)
                                @if($province->provinsi == $event->provinsi)
                                    <option value="{{$province->provinsi}}" selected>{{$province->provinsi}}</option>
                                @else
                                    <option value="{{$province->provinsi}}">{{$province->provinsi}}</option>
                                @endif
                            @endforeach
                        </select>
                </div>
                <div class="col-sm-6">
                    <!--kota-->
                    <select id="kota" class="form-control" name="kota">
                        <option disabled selected>Pilih Kota/ Kabupaten</option>
                        @foreach($citys as $city)
                        @if($city->nama_kota == $event->tempat)
                            <option value="{{$city->nama_kota}}" selected>{{$city->nama_kota}}</option>
                        @else
                            <option value="{{$city->nama_kota}}">{{$city->nama_kota}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- <label for="locationdesc"></label> -->
            <!-- <textarea name="LocationDesc" id="locationdesc">{{$event->tempat}}</textarea> -->
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" onClick="sweetOk()">Edit</button>
        </div>
        </form>
        
    </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="PriceModal">
    <div class="modal-dialog">
    <div class="modal-content" syle="z-index:100">
    
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Edit Judul</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="{{route('organizers.update.price')}}" method="post">
        @csrf
        <div class="modal-body">
            <input type="hidden" value="{{$event->id_event}}" name="change_title_id">
            <label for="changePrice">New Price</label>
            <input type="number" value="{{$event->harga}}" name="changePrice" class="form-control" id="changePrice">

            <!-- <textarea name="LocationDesc" id="locationdesc">{{$event->tempat}}</textarea> -->
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" onClick="sweetOk()">Edit</button>
        </div>
        </form>
        
    </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="DescModal">
    <div class="modal-dialog modal-xl">
    <div class="modal-content" syle="z-index:100">
    
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Edit Judul</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="{{route('organizers.update.desc')}}" method="post">
        @csrf
        <div class="modal-body">
            <input type="hidden" value="{{$event->id_event}}" name="change_title_id">
            <label for="changeDesc">New Price</label>
            <textarea name="changeDesc" id="changeDesc">{{$event->deskripsi}}</textarea>

            <!-- <textarea name="LocationDesc" id="locationdesc">{{$event->tempat}}</textarea> -->
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" onClick="sweetOk()">Edit</button>
        </div>
        </form>
        
    </div>
    </div>
</div>

<script>

    function sweetOk(){
        Swal.fire({
            title: 'Data Updated!',
            text: "Title has been updated!",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok',
        })
    }
</script>
@endsection