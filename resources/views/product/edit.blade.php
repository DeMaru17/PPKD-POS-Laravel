@extends('layouts.app')
@section('title','Edit Produk')

@section('content')

    <form action="{{route('product.update',$product->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <div class="col-sm-1">
                <label for="" class="form-label">Nama Kategori <span style="color: red">*</span></label>
            </div>
            <div class="col-sm-4">
                <select required class="form-control" id="" name="category_id">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $cat)
                    <option {{$cat->id == $product->category_id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-1">
                <label for="" class="form-label">Nama Produk <span style="color: red">*</span></label>
            </div>
            <div class="col-sm-4">
                <input required type="text" class="form-control" id="" name="product_name" placeholder="Nama Produk" value="{{$product->product_name}}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-1">
                <label for="" class="form-label">Jumlah Produk <span style="color: red">*</span></label>
            </div>
            <div class="col-sm-4">
                <input required type="number" class="form-control" id="" name="product_qty" placeholder="Jumlah Produk" value="{{$product->product_qty}}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-1">
                <label for="" class="form-label">Harga Produk <span style="color: red">*</span></label>
            </div>
            <div class="col-sm-4">
                <input required type="number" class="form-control" id="" name="product_price" placeholder="Harga Produk" value="{{$product->product_price}}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <button class="btn btn-primary mx-2" type="submit">Simpan</button>
                <a class="btn btn-danger" href="{{url('product')}}">Kembali</a>
            </div>
            </div>
        </div>
    </form>

@endsection
