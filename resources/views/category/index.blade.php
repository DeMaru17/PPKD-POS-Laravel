@extends('layouts.app')
@section('title', 'Data Kategori')
@section('content')


<div class="table-responsive">
    <div class="mb-3" align="right">

        <a href="{{route('category.create')}}" class="btn btn-primary">Tambah Kategori</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($category as $cat )
            <tr>
                <td>{{$no++}}</td>
                <td>{{$cat->category_name}}</td>
                <td>


                    <a href=" {{route('category.edit',$cat->id)}}" class="btn btn-primary">Edit</a>
                    {{-- <a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger btn-xs">Delete</a> --}}
                    <form class="d-inline" action="{{route('category.destroy', $cat->id)}}" method="post">
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
