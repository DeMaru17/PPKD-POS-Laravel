@extends('layouts.app')
@section('title','Tambah User')

@section('content')

    <form action="{{route('user.store')}}" method="post">
        @csrf
        <div class="mb-3 row">
            <div class="col-sm-1">
                <label for="" class="form-label">Nama Lengkap <span style="color: red">*</span></label>
            </div>
            <div class="col-sm-4">
                <input required type="text" class="form-control" id="" name="name" placeholder="Nama Lengkap">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-1">
                <label for="" class="form-label">Email <span style="color: red">*</span></label>
            </div>
            <div class="col-sm-4">
                <input required type="email" class="form-control" id="" name="email" placeholder="Email">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-1">
                <label for="" class="form-label">Password <span style="color: red">*</span></label>
            </div>
            <div class="col-sm-4">
                <input required type="password" class="form-control" id="" name="password" placeholder="Password">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <button class="btn btn-primary mx-2" type="submit">Simpan</button>
                <a class="btn btn-danger" href="{{url('user')}}">Kembali</a>
            </div>
        </div>
    </form>

@endsection
