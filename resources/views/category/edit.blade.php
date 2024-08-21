@extends('layouts.app')
@section('title','Edit Kategori')

@section('content')

    <form action="{{route('category.update',$edit->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <div class="col-sm-1">
                <label for="" class="form-label">Nama Kategori <span style="color: red">*</span></label>
            </div>
            <div class="col-sm-4">
                <input value="{{$edit->category_name}}" required type="text" class="form-control" id="" name="category_name" placeholder="Nama Kategori">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <button class="btn btn-primary mx-2" type="submit">Simpan</button>
                <a class="btn btn-danger" href="{{url('category')}}">Kembali</a>
            </div>
            </div>
        </div>
    </form>

@endsection
