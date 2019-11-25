@extends('layouts.app')

@section('content')
<div onClick="CloseModal()" class="Stev-event-modal-cover hidden" id="cover-modal"></div>
<div class="Stev-event-modal col-md-4 offset-4 hidden" id="content-modal">
    <div class="Stev-event-modal-background">
        <img src="{{ asset('img/event') }}/{{$events->sampul}}" alt="">
    </div>
    <div class="Stev-event-modal-content pb-4">
        <h2>{{$events->judul}}</h2>
        <h6 class="Stev-event-header-content mt-1"><span class="fa fa-calendar" aria-hidden="true"></span> Date Time</h6>
        <p>{{$events->created_at}}</p>
        <h6 class="Stev-event-header-content mt-1"><span class="fa fa-map-marker" aria-hidden="true"></span> Location</h6>
        <p>{{$events->tempat}}</p>
        <h6 class="Stev-event-header-content mt-1"><span class="fa fa-align-left" aria-hidden="true"></span> Description</h6>
        <p>{{$events->deskripsi}}</p>
        <a href="/getTicket/{{$events->id_event}}"><button onClick="CloseModal()" class="btn Stev-event-modal-button form-control" id="close">Pesan</button></a>
    </div>
</div>


<div class="Stev-event">
    <div class="container">
        <div class="Stev-event-content row">
            <div class="col-md-3">
                <img src="{{ asset('img/event') }}/{{$events->sampul}}" alt="" class="w-100">
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="font-weight-bold">{{$events->judul}}</h2>
                        <div class="Stev-Tag-box">Technology</div>
                        <div class="py-2">
                            <h4>
                                <span class="fa fa-heart text-danger"></span> <small class="ml-1 mr-2">1,5K</small>
                                <span class="fa fa-share"></span> <small class="ml-1 mr-2">800</small>
                                <span class="fa fa-comments"></span> <small class="ml-1 mr-2">20</small>
                            </h4>
                        </div>
                        <div class="text-secondary">By Agus Indra Cahaya</div>
                        <p class=mt-3>{{$events->tempat}}, {{$events->provinsi}}</p>
                        <br>
                    </div>
                    <div class="col-sm-6 align-right" style="color : #FF7D05">
                        <div class="float-right">
                            <?php $hari = date('D',strtotime($events->jadwal)); ?>
                            <?php $jadwal = date('d M Y',strtotime($events->jadwal)); ?>
                            <?php $waktu = date('H.i',strtotime($events->jadwal)); ?>
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
                        @if($events->harga > 0)
                            <?php $price = number_format($events->harga,2,',','.'); ?>
                            <h3 class="float-right font-weight-light">Rp{{$price}}</h3>
                        @else
                            <h3 class="float-right font-weight-light">Free to Enter</h3>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="float-right">
                    <button class="btn btn-secondary px-5" onClick="sweetInfo()">Keep</button>
                    <button class="btn btn-success px-5" onClick="sweetOk()">Get Tickets</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="Stev-event-content row">
            <div class="Stev-event-description-box">
                <div class="Stev-event-description-menu">
                    <div id="desc-Button" class="active" onClick="showDesc()"><span class="fa fa-align-left mr-1"></span> Description</div>
                    <div id="comm-Button" class="" onClick="showComment()"><span class="fa fa-comments mr-1"></span> Comments</div>
                </div>
            </div>
            <div id="desc" class="Stev-event-description-box">
                <div class="mt-5 px-3">{!!$events->deskripsi!!}</div>
            </div>
            <div id="comment" class="hidden">
                <div class="Stev-event-comment row mt-5">
                    <div class="col-sm-1">
                        <img src="{{ asset('img/event') }}/ca7b903624147cd0634f5fbbeeeeed98.jpg" class="Stev-comment-img" alt="">
                    </div>
                    <div class="col-sm-11">
                        <textarea name="comment" class="form-control" id="" rows="3"></textarea>
                        <button class="btn btn-success mt-2 float-right"><span class="fa fa-paper-plane"></span> Post</button>
                    </div>
                </div>
                <div class="Stev-event-comment row mt-2">
                    <div class="col-sm-2">
                        <img src="{{ asset('img/event') }}/ca7b903624147cd0634f5fbbeeeeed98.jpg" class="Stev-comment-img" alt="">
                    </div>
                    <div class="col-sm-10">
                        <b>Nama User</b>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo omnis repellendus nostrum, eveniet nam iure error sunt, voluptatibus dolore maiores optio eaque hic cumque non similique esse eos inventore nihil?</p>
                    </div>
                </div>
                <div class="Stev-event-comment row mt-2">
                    <div class="col-sm-2">
                        <img src="{{ asset('img/event') }}/ca7b903624147cd0634f5fbbeeeeed98.jpg" class="Stev-comment-img" alt="">
                    </div>
                    <div class="col-sm-10">
                        <b>Nama User</b>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo omnis repellendus nostrum, eveniet nam iure error sunt, voluptatibus dolore maiores optio eaque hic cumque non similique esse eos inventore nihil?</p>
                    </div>
                </div>
                <div class="Stev-event-comment row mt-2">
                    <div class="col-sm-2">
                        <img src="{{ asset('img/event') }}/ca7b903624147cd0634f5fbbeeeeed98.jpg" class="Stev-comment-img" alt="">
                    </div>
                    <div class="col-sm-10">
                        <b>Nama User</b>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo omnis repellendus nostrum, eveniet nam iure error sunt, voluptatibus dolore maiores optio eaque hic cumque non similique esse eos inventore nihil?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function sweetOk(){
        Swal.fire({
            title: 'Are you sure?',
            text: "Tickets that already purchased can't be refund!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#908C8C',
            confirmButtonText: 'Yes',
            cancelButtonText: 'I change my mind'
            }).then((result) => {
            if (result.value) {
                window.location.href = "{{route('getTicket',['id_event' => $events->id_event])}}"
                // Swal.fire({
                //     title: 'Got It!',
                //     text: "This event already on your hand!",
                //     icon: 'success',
                //     showCancelButton: true,
                //     confirmButtonColor: '#3085d6',
                //     cancelButtonColor: '#908C8C',
                //     confirmButtonText: 'Check it!',
                //     cancelButtonText: 'Skip'
                //     }).then((result) => {
                //     if (result.value) {
                //         location.href = "{{route('myTicket')}}"
                //     }
                // })
            }
        })
    }

    function sweetInfo(){
        Swal.fire({
            title: 'Keeped!',
            text: "This event already on your hand!",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#908C8C',
            confirmButtonText: 'Check it!',
            cancelButtonText: 'Skip'
            }).then((result) => {
            if (result.value) {
                location.href = "{{route('myTicket')}}"
            }
        })
    }
    
    function Pesan() {
        document.getElementById("cover-modal").classList.remove("hidden");
        document.getElementById("content-modal").classList.remove("hidden");
        console.log('test')
    }

    function CloseModal() {
        document.getElementById("cover-modal").classList.add("hidden");
        document.getElementById("content-modal").classList.add("hidden");
    }

    function showComment(){
        document.getElementById("comm-Button").classList.add('active')
        document.getElementById("desc-Button").classList.remove('active')
        document.getElementById("desc").classList.add("hidden")
        document.getElementById("comment").classList.remove("hidden")
    }
    function showDesc(){
        document.getElementById("desc-Button").classList.add('active')
        document.getElementById("comm-Button").classList.remove('active')
        document.getElementById("desc").classList.remove("hidden")
        document.getElementById("comment").classList.add("hidden")
    }

</script>

@endsection