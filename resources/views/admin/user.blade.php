@extends('layouts.app')

@section('content')
<div class="row pt-3">
    @include('admin.layouts.sidebar')
    <div class="col-md-10 offset-2 Stev-dashboard-content row">
        <div class="col-md-11 card mt-5" style="background-color:white">
            <button class="btn btn-success m-3 w-25"><span class="fa fa-plus"></span> Add Account</button>
            <br>
            <table class="table table-striped table-borderless">
                <thead>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Akun</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="align-self-center">
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->account}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->status}}</td>
                        <td>
                            @if($user->status == 'unblock')
                            <form action="{{route('admin.change_status')}}" method="post">
                            @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="hidden" name="status" value="block">
                                <button type="submit" class="btn btn-danger"><span class="fa fa-lock"></span></button>
                            </form>
                            @else
                            <form action="{{route('admin.change_status')}}" method="post">
                            @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="hidden" name="status" value="unblock">
                                <button type="submit" class="btn btn-primary"><span class="fa fa-unlock"></span></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection