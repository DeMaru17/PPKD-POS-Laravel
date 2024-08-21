@extends('layouts.app')
@section('title', 'Data Produk')
@section('content')


<div class="table-responsive">
    <div class="mb-3" align="right">

        <a href="{{route('product.create')}}" class="btn btn-primary">Tambah Produk</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Nama Produk</th>
                <th>Jumlah Produk</th>
                <th>Harga Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($products as $pro )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$pro->category->category_name}}</td>
                <td>{{$pro->product_name}}</td>
                <td>{{$pro->product_qty}}</td>
                <td>{{$pro->product_price}}</td>
                <td>


                    <a href=" {{route('product.edit',$pro->id)}}" class="btn btn-primary">Edit</a>
                    <form class="d-inline" action="{{route('product.destroy', $pro->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
