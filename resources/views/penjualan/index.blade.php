@extends('layouts.app')
@section('title','Transaksi Penjualan')

@section('content')
<form action="{{route('penjualan.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <input type="hidden" id="product_name">
            <input type="hidden" id="product_price">
            <div class="mb-3">
                <label for="">Kode Transaksi</label>
                <input type="text" name="kode_transaksi" class="form-control" value="{{$kode_transaksi ?? ""}}" readonly>
            </div>
            <div class="mb-3">
                <label for="">Kategori Produk <span style="color: red">*</span></label>
                <select class="form-control" name="category_id" id="category_id" required>
                    <option value="">Pilih Kategori Produk</option>
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Jumlah Produk <span style="color: red">*</span></label>
                <input type="number" class="form-control" name="qty" id="product_qty" placeholder="Jumlah produk" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="">Tanggal Transaksi</label>
                <input type="text" name="tanggal_transaksi" class="form-control" value="<?= date('d/M/Y') ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="">Nama Produk <span style="color: red">*</span></label>
                <select class="form-control" name="product_id" id="product_id" required>
                    <option value="">Pilih Produk</option>
                </select>
            </div>
        </div>
    </div>

    <div class="table-transaction mt-5">
        <div align="right" class="mb-3">
            <button type="button" class="btn btn-primary tambah-produk" >Tambah Produk</button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah Produk</th>
                    <th>Sub Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                </tr>
            </tbody>
        </table>
        <div class="row mt-2">
            <div class="col-sm-9">
                <h3><b>Total</b></h3>
            </div>
            <div class="col-sm-3">
                <h4 class="total_price"></h4>
                <input type="hidden" name="total_price" id="total_price_val">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-9">
                <h3><b>Bayar</b></h3>
            </div>
            <div class="col-sm-3">
                <input type="number" class="form-control" name="dibayar" id="dibayar">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-9">
                <h3><b>Kembali</b></h3>
            </div>
            <div class="col-sm-3">
                <h4 class="kembalian_text"></h4>
                <input type="hidden" class="form-control" id="kembalian" name="kembalian" readonly>
            </div>
        </div>
        <div class="mt-4" align="right">
            <button type="submit" class="btn btn-success">Buat Pesanan</button>
        </div>
    </div>
</form>
@endsection
