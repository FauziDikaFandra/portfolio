@extends('goods/Layout/main')
<!-- ambil dari template main.blade.php harus pakai blade di file name dan tanpa blade di page -->

@section('title','Home')
<!-- yield yang ada di main.blade.php -->

@section('container')
<!-- yield yang ada di main.blade.php karena lebih dari satu baris harus ada endsection di pling bawah -->

<div class="starter-template mt-3  shadow p-3 mb-5 bg-white rounded">
    <h4>Welcome, </h4>
    <p class="lead">{{$nama ?? ''}}. <br> Selamat Bekerja !!!.</p>
</div>


@endsection